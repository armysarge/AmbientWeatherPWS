<?php
    header('Content-type: application/json');
    require 'config.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  
    
    //$xAxisData=array();
    $TempIndoor1Data=array();
    $TempOutdoor1Data=array();
    $TempIndoor2Data=array();
    $TempOutdoor2Data=array();
    $TempIndoor3Data=array();
    $TempOutdoor3Data=array();
    $TempOutdoor4Data=array();
    $Wind1Data=array();
    $Wind2Data=array();
    $Wind3Data=array();
    $AirPressure1Data=array();
    $SolarRadiation1Data=array();
    $SolarRadiation2Data=array();
    $Humidity1Data=array();
    $Humidity2Data=array();
    
    // Load Latest Values
    $sql = "SELECT ".(($timezone >= 0)?"DATE_ADD":"DATE_SUB")."(dateutc, INTERVAL ".abs($timezone)." HOUR) newdateutc,tempinf,tempf,humidityin,humidity,windspeedmph,windgustmph,baromrelin,baromabsin,solarradiation,uv,winddir FROM ".$dbtable." ORDER BY idWeather DESC LIMIT 3400";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $Timestamp = strtotime($row["newdateutc"])*1000;
            $IndoorCelcius = convertToCelcius($row["tempinf"]);
            $OutdoorCelcius = convertToCelcius($row["tempf"]);
            $IndoorHumidity = intval($row["humidityin"]);
            $OutdoorHumidity = intval($row["humidity"]);
            $IndoorDewPoint = calcDP($row["tempinf"],$IndoorHumidity);
            $OutdoorDewPoint = calcDP($row["tempf"],$OutdoorHumidity);
            $IndoorHeatIndex = calcHI(floatval($row["tempinf"]),$IndoorHumidity);
            $OutdoorHeatIndex = calcHI(floatval($row["tempf"]),$OutdoorHumidity);
            $Windspeedmph = floatval($row["windspeedmph"]);
            $Windgustmph = floatval($row["windgustmph"]);
            $WindDirection = floatval($row["winddir"]);
            $BarometerRel = round(floatval($row["baromrelin"])*33.86389,1);
            $BarometerAbs = round(floatval($row["baromabsin"])*33.86389,1);
            $SolarRadiation = floatval($row["solarradiation"]);
            $UV = intval($row["uv"]);
            /*$OutdoorWindChill = calcWC(floatval($row["tempf"]),floatval($row["windspeedmph"]));*/

            //array_push($xAxisData,$row["dateutc"]);
            array_push($TempIndoor1Data,array($Timestamp,floatval($row["tempinf"])));
            array_push($TempOutdoor1Data,array($Timestamp,floatval($row["tempf"])));
            array_push($TempIndoor2Data,array($Timestamp,$IndoorHeatIndex));
            array_push($TempOutdoor2Data,array($Timestamp,$OutdoorHeatIndex));
            array_push($TempIndoor3Data,array($Timestamp,$IndoorDewPoint));
            array_push($TempOutdoor3Data,array($Timestamp,$OutdoorDewPoint));
            /*array_push($TempOutdoor4Data,array($Timestamp,$OutdoorWindChill));*/
            array_push($Wind1Data,array($Timestamp,$Windspeedmph));
            array_push($Wind2Data,array($Timestamp,$Windgustmph));
            array_push($Wind3Data,array($Timestamp,$WindDirection));
            array_push($AirPressure1Data,array($Timestamp,$BarometerRel));
            array_push($SolarRadiation1Data,array($Timestamp,$SolarRadiation));
            array_push($SolarRadiation2Data,array($Timestamp,$UV));
            array_push($Humidity1Data,array($Timestamp,$IndoorHumidity));
            array_push($Humidity2Data,array($Timestamp,$OutdoorHumidity));
        }
    }

    //$myObj->xAxisData = $xAxisData;
    $myObj->timezone = $timezone;
    $myObj->TempIndoor1Data = $TempIndoor1Data;
    $myObj->TempOutdoor1Data = $TempOutdoor1Data;
    $myObj->TempIndoor2Data = $TempIndoor2Data;
    $myObj->TempOutdoor2Data = $TempOutdoor2Data;
    $myObj->TempIndoor3Data = $TempIndoor3Data;
    $myObj->TempOutdoor3Data = $TempOutdoor3Data;
    /*$myObj->TempOutdoor4Data = $TempOutdoor4Data;*/
    $myObj->Wind1Data = $Wind1Data;
    $myObj->Wind2Data = $Wind2Data;
    $myObj->Wind3Data = $Wind3Data;
    $myObj->AirPressure1Data = $AirPressure1Data;
    $myObj->SolarRadiation1Data = $SolarRadiation1Data;
    $myObj->SolarRadiation2Data = $SolarRadiation2Data;
    $myObj->Humidity1Data = $Humidity1Data;
    $myObj->Humidity2Data = $Humidity2Data;

    echo json_encode($myObj);    
?>