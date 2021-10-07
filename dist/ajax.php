<?php
    header('Content-type: application/json');
    require 'config.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }   

    $myObj = new stdClass();
    
    // Load Latest Values
    $sql = "SELECT *,".(($timezone >= 0)?"DATE_ADD":"DATE_SUB")."(dateutc, INTERVAL ".abs($timezone)." HOUR) correctdate FROM ".$dbtable." ORDER BY idWeather DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $myObj->id = intval($row["idWeather"]);
        $myObj->date = strtotime($row["correctdate"])*1000;
        $myObj->IndoorTemp = floatval($row["tempinf"]);
        $myObj->OutdoorTemp = floatval($row["tempf"]);
        $IndoorCelcius = convertToCelcius($row["tempinf"]);
        $OutdoorCelcius = convertToCelcius($row["tempf"]);
        $myObj->IndoorHum = intval($row["humidityin"]);
        $myObj->OutdoorHum = intval($row["humidity"]);
        $myObj->IndoorHeatIndex = calcHI($myObj->IndoorTemp,$myObj->IndoorHum);
        $myObj->IndoorDewPoint = calcDP($myObj->IndoorTemp,$myObj->IndoorHum);
        $myObj->OutdoorHeatIndex = calcHI($myObj->OutdoorTemp,$myObj->OutdoorHum);
        $myObj->OutdoorWindChill = calcWC(floatval($row["tempf"]),floatval($row["windspeedmph"]));
        $myObj->OutdoorDewPoint = calcDP($myObj->OutdoorTemp,$myObj->OutdoorHum);
        $myObj->BarometerRel = round(floatval($row["baromrelin"])*33.86389,1);
        $myObj->BarometerAbs = round(floatval($row["baromabsin"])*33.86389,1);
        $myObj->WindDirection = intval($row["winddir"]);
        $myObj->WindSpeed = floatval($row["windspeedmph"]);
        $myObj->WindGust = floatval($row["windgustmph"]);
        $myObj->EventRain = floatval($row["eventrainin"]);
        $myObj->HourlyRain = floatval($row["hourlyrainin"]);
        $myObj->DailyRain = floatval($row["dailyrainin"]);
        $myObj->SolarRadiation = floatval($row["solarradiation"]);
        $myObj->UV = floatval($row["uv"]);

    }

    // Get max & min values for the day
    $sql = "SELECT ".
        "MIN(tempinf) tempinfmin ".
        ",MAX(tempinf) tempinfmax ".
        ",MIN(humidityin) inhummin ".
        ",MAX(humidityin) inhummax ".
        ",MIN(tempf) tempfmin ".
        ",MAX(tempf) tempfmax ".
        ",MIN(humidity) outhummin ".
        ",MAX(humidity) outhummax ".
        ",MIN(windspeedmph) WindSpeedMin ".
        ",MAX(maxdailygust) WindSpeedMax ".
        ",MAX(solarradiation) SolarRadiationMax ".
        ",MAX(uv) UVMax ".
        "FROM ".$dbtable." WHERE ".(($timezone >= 0)?"DATE_ADD":"DATE_SUB")."(dateutc, INTERVAL ".abs($timezone)." HOUR) >= CURDATE() AND ".(($timezone >= 0)?"DATE_ADD":"DATE_SUB")."(dateutc, INTERVAL ".abs($timezone)." HOUR) < CURDATE() + INTERVAL 1 DAY";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $myObj->IndoorTempMin = floatval($row["tempinfmin"]);
        $myObj->IndoorTempMax = floatval($row["tempinfmax"]);
        $myObj->IndoorHumMin = floatval($row["inhummin"]);
        $myObj->IndoorHumMax = floatval($row["inhummax"]);
        $myObj->OutdoorTempMin = floatval($row["tempfmin"]);
        $myObj->OutdoorTempMax = floatval($row["tempfmax"]);
        $myObj->OutdoorHumMin = floatval($row["outhummin"]);
        $myObj->OutdoorHumMax = floatval($row["outhummax"]);
        $myObj->WindSpeedMin = floatval($row["WindSpeedMin"]);
        $myObj->WindSpeedMax = floatval($row["WindSpeedMax"]);
        $myObj->SolarRadiationMax = floatval($row["SolarRadiationMax"]);
        $myObj->UVMax = floatval($row["UVMax"]);
    }

    // Get values from previous day
    $myObj->IndoorTempYest = 0;
    $myObj->OutdoorTempYest = 0;
    $sql = "SELECT ".
        "tempinf ".
        ",tempf ".
        ",humidityin ".
        ",humidity ".
        "FROM ".$dbtable." WHERE date_format(".(($timezone >= 0)?"DATE_ADD":"DATE_SUB")."(dateutc, INTERVAL ".abs($timezone)." HOUR),'%Y-%m-%d %H:%i') = date_format(DATE_SUB(now(), INTERVAL 1 DAY),'%Y-%m-%d %H:%i') LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $myObj->IndoorTempYestf = round($myObj->IndoorTemp - floatval($row["tempinf"]),2);
        $myObj->OutdoorTempYestf = round($myObj->OutdoorTemp - floatval($row["tempf"]),2);
        $myObj->IndoorTempYestc = round(convertToCelcius($myObj->IndoorTemp) - convertToCelcius($row["tempinf"]),2);
        $myObj->OutdoorTempYestc = round(convertToCelcius($myObj->OutdoorTemp) - convertToCelcius($row["tempf"]),2);
        $myObj->IndoorHumYest = round($myObj->IndoorHum - floatval($row["humidityin"]),2);
        $myObj->OutdoorHumYest = round($myObj->OutdoorHum - floatval($row["humidity"]),2);
    }

    // Get values from previous hour
    $sql = "SELECT ".
        "baromrelin ".
        ",baromabsin ".
        "FROM ".$dbtable." WHERE date_format(".(($timezone >= 0)?"DATE_ADD":"DATE_SUB")."(dateutc, INTERVAL ".abs($timezone)." HOUR),'%Y-%m-%d %H:%i') = date_format(DATE_SUB(now(), INTERVAL 1 HOUR),'%Y-%m-%d %H:%i') LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $myObj->BarometerRelPreviousHour = round(floatval($row["baromrelin"])*33.86389,1);
        $myObj->BarometerAbsPreviousHour = round(floatval($row["baromabsin"])*33.86389,1);
    }

    echo json_encode($myObj);    
?>