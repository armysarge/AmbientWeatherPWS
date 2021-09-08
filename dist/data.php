<?php
  require 'config.php';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{

    $val = $conn->query('select 1 from '.$dbtable.' LIMIT 1');

    if($val === FALSE)
    {
      $sql = "CREATE TABLE ".$dbtable."(".
        "idWeather INT NOT NULL AUTO_INCREMENT, ".
        "dateutc DATETIME NOT NULL, ".
        
        "tempinf DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "tempf DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp1f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp2f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp3f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp4f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp5f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp6f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp7f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp8f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp9f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "temp10f DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit

        "humidityin SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity1 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity2 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity3 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity4 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity5 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity6 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity7 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity8 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity9 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "humidity10 SMALLINT NULL DEFAULT NULL, ". // Percentage

        "baromrelin DECIMAL(6,3) NULL DEFAULT NULL, ". //inHg
        "baromabsin DECIMAL(6,3) NULL DEFAULT NULL, ". //inHg

        "winddir SMALLINT NULL DEFAULT NULL, ". // 0-360 degrees
        "windgustdir SMALLINT NULL DEFAULT NULL, ". // 0-360 degrees
        "windspeedmph DECIMAL(6,3) NULL DEFAULT NULL, ".// Mph
        "windgustmph DECIMAL(6,3) NULL DEFAULT NULL, ".// Mph
        "maxdailygust DECIMAL(6,3) NULL DEFAULT NULL, ".// Mph
        "windspdmph_avg2m DECIMAL(6,3) NULL DEFAULT NULL, ".// Average wind speed, 2 minute average , Mph
        "winddir_avg2m SMALLINT NULL DEFAULT NULL, ".// Average wind direction, 2 minute average , 0-360 degrees
        "windspdmph_avg10m DECIMAL(6,3) NULL DEFAULT NULL, ".// Average wind speed, 10 minute average , Mph
        "winddir_avg10m SMALLINT NULL DEFAULT NULL, ".// Average wind direction, 10 minute average , 0-360 degrees
        "windgustmphinterval DECIMAL(6,3) NULL DEFAULT NULL, ". //Max Wind Speed in update interval, the default is one minute Mph

        "eventrainin DECIMAL(6,3) NULL DEFAULT NULL, ".// inches
        "hourlyrainin DECIMAL(6,3) NULL DEFAULT NULL, ".// inches
        "dailyrainin DECIMAL(6,3) NULL DEFAULT NULL, ".// inches
        "weeklyrainin DECIMAL(6,3) NULL DEFAULT NULL, ".// inches
        "monthlyrainin DECIMAL(6,3) NULL DEFAULT NULL, ".// inches
        "yearlyrainin DECIMAL(6,3) NULL DEFAULT NULL, ".// inches
        "totalrain DECIMAL(6,3) NULL DEFAULT NULL, ".// inches

        "solarradiation DECIMAL(6,3) NULL DEFAULT NULL, ". // W/m2
        "uv INT NULL DEFAULT NULL, ".
        "co2 INT NULL DEFAULT NULL, ". //ppm
        "co2_in INT NULL DEFAULT NULL, ". //indoor ppm
        "co2_in_24h INT NULL DEFAULT NULL, ". //indoor 24 hour running average ppm

        "pm25 DECIMAL(6,3) NULL DEFAULT NULL, ". //PM2.5 Air Quality Sensor µg/m3
        "pm25_24h DECIMAL(6,3) NULL DEFAULT NULL, ". //PM2.5 Air Quality Sensor 24 hour running average µg/m3
        "pm25_in DECIMAL(6,3) NULL DEFAULT NULL, ". //PM2.5 Air Quality Sensor indoor µg/m3
        "pm25_in_24h DECIMAL(6,3) NULL DEFAULT NULL, ". //PM2.5 Air Quality Sensor indoor 24 hour running average µg/m3
        "pm10_in DECIMAL(6,3) NULL DEFAULT NULL, ". //PM1.0 Air Quality Sensor indoor µg/m3
        "pm10_in_24h DECIMAL(6,3) NULL DEFAULT NULL, ". //PM1.0 Air Quality Sensor indoor 24 hour running average µg/m3
      
        "pm_in_temp DECIMAL(6,3) NULL DEFAULT NULL, ". //Indoor PM sensor temperature Fahrenheit
        "pm_in_humidity SMALLINT NULL DEFAULT NULL, ". //Indoor PM sensor humidity Percentage µg/m3

        "soiltemp1 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp2 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp3 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp4 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp5 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp6 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp7 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp8 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp9 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soiltemp10 DECIMAL(6,3) NULL DEFAULT NULL, ". //Fahrenheit
        "soilhum1 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum2 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum3 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum4 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum5 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum6 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum7 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum8 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum9 SMALLINT NULL DEFAULT NULL, ". // Percentage
        "soilhum10 SMALLINT NULL DEFAULT NULL, ". // Percentage

        "leak1 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
        "leak2 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
        "leak3 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
        "leak4 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.

        "lightning_time DOUBLE NULL DEFAULT NULL, ". // Last strike date and time,	Seconds since January 1, 1970
        "lightning_day INT NULL DEFAULT NULL, ". // Number of strikes per day,	Seconds since January 1, 1970
        "lightning_distance SMALLINT NULL DEFAULT NULL, ". // Distance of last strike,	Kilometers

        "battout TINYINT NULL DEFAULT NULL, ".//Low battery indication, outdoor sensor array or suite
        "battin TINYINT NULL DEFAULT NULL, ".//Low battery indication, indoor sensor or console
        "batt1 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 1
        "batt2 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 2
        "batt3 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 3
        "batt4 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 4
        "batt5 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 5
        "batt6 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 6
        "batt7 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 7
        "batt8 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 8
        "batt9 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 9
        "batt10 TINYINT NULL DEFAULT NULL, ".//Low battery indication, sensor 10
        "battr1 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 1
        "battr2 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 2
        "battr3 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 3
        "battr4 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 4
        "battr5 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 5
        "battr6 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 6
        "battr7 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 7
        "battr8 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 8
        "battr9 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 9
        "battr10 TINYINT NULL DEFAULT NULL, ".//Low battery indication, relay 10
        "batt_25 TINYINT NULL DEFAULT NULL, ".//Low battery indication, PM2.5
        "batt_25in TINYINT NULL DEFAULT NULL, ".//Low battery indication, PM2.5 indoor
        "batleak1 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
        "batleak2 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
        "batleak3 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
        "batleak4 TINYINT NULL DEFAULT NULL, ". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
        "batt_lightning TINYINT NULL DEFAULT NULL, ".//Lighting detector battery
        "battsm1 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 1 battery
        "battsm2 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 2 battery
        "battsm3 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 3 battery
        "battsm4 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 4 battery
        "battsm5 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 5 battery
        "battsm6 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 6 battery
        "battsm7 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 7 battery
        "battsm8 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 8 battery
        "battsm9 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 9 battery
        "battsm10 TINYINT NULL DEFAULT NULL, ".//Soil Moisture 10 battery
        "battrain TINYINT NULL DEFAULT NULL, ".//Rain Gauge battery

        "PRIMARY KEY (`idWeather`));";

      if ($conn->query($sql) === TRUE) {
        echo "New table created successfully";
        $conn->query("CREATE UNIQUE INDEX WeatherID ON ".$dbtable."(idWeather);");
        insertData($dbtable, $conn);
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $fp = fopen(dirname(__FILE__). "/error.log", "w");
        fwrite($fp, date("l jS \of F Y h:i:s A"). " --- " . $conn->error); 
        fclose($fp);
      }
    }else{
      insertData($dbtable, $conn);
    }
  }

  function getValue($GETItem){
    return isset($_GET[$GETItem]) ? "'".str_replace("'", "",$_GET[$GETItem])."'" : 'NULL';
  }

  function insertData($dbtable, $conn){
    $sql2 = "INSERT INTO ".$dbtable."(dateutc,tempinf,tempf,temp1f,temp2f,temp3f,temp4f,temp5f,temp6f,temp7f,temp8f,temp9f,temp10f,humidityin,humidity,humidity1,humidity2,humidity3,humidity4,humidity5,humidity6,humidity7,humidity8,humidity9,humidity10,baromrelin,baromabsin,winddir,windgustdir,windspeedmph,windgustmph,maxdailygust,windspdmph_avg2m,winddir_avg2m,windspdmph_avg10m,winddir_avg10m,windgustmphinterval,eventrainin,hourlyrainin,dailyrainin,weeklyrainin,monthlyrainin,yearlyrainin,totalrain,solarradiation,uv,co2,co2_in,co2_in_24h,pm25,pm25_24h,pm25_in,pm25_in_24h,pm10_in,pm10_in_24h,pm_in_temp,pm_in_humidity,soiltemp1,soiltemp2,soiltemp3,soiltemp4,soiltemp5,soiltemp6,soiltemp7,soiltemp8,soiltemp9,soiltemp10,soilhum1,soilhum2,soilhum3,soilhum4,soilhum5,soilhum6,soilhum7,soilhum8,soilhum9,soilhum10,leak1,leak2,leak3,leak4,lightning_time,lightning_day,lightning_distance,battout,battin,batt1,batt2,batt3,batt4,batt5,batt6,batt7,batt8,batt9,batt10,battr1,battr2,battr3,battr4,battr5,battr6,battr7,battr8,battr9,battr10,batt_25,batt_25in,batleak1,batleak2,batleak3,batleak4,batt_lightning,battsm1,battsm2,battsm3,battsm4,battsm5,battsm6,battsm7,battsm8,battsm9,battsm10,battrain) ". 
      "VALUES (".
      getValue("dateutc").",".

      getValue("tempinf").",". //Fahrenheit
      getValue("tempf").",". //Fahrenheit
      getValue("temp1f").",". //Fahrenheit
      getValue("temp2f").",". //Fahrenheit
      getValue("temp3f").",". //Fahrenheit
      getValue("temp4f").",". //Fahrenheit
      getValue("temp5f").",". //Fahrenheit
      getValue("temp6f").",". //Fahrenheit
      getValue("temp7f").",". //Fahrenheit
      getValue("temp8f").",". //Fahrenheit
      getValue("temp9f").",". //Fahrenheit
      getValue("temp10f").",". //Fahrenheit

      getValue("humidityin").",". // Percentage
      getValue("humidity").",". // Percentage
      getValue("humidity1").",". // Percentage
      getValue("humidity2").",". // Percentage
      getValue("humidity3").",". // Percentage
      getValue("humidity4").",". // Percentage
      getValue("humidity5").",". // Percentage
      getValue("humidity6").",". // Percentage
      getValue("humidity7").",". // Percentage
      getValue("humidity8").",". // Percentage
      getValue("humidity9").",". // Percentage
      getValue("humidity10").",". // Percentage

      getValue("baromrelin").",". //inHg
      getValue("baromabsin").",". //inHg

      getValue("winddir").",". // 0-360 degrees
      getValue("windgustdir").",". // 0-360 degrees
      getValue("windspeedmph").",".// Mph
      getValue("windgustmph").",".// Mph
      getValue("maxdailygust").",".// Mph
      getValue("windspdmph_avg2m").",".// Average wind speed, 2 minute average , Mph
      getValue("winddir_avg2m").",".// Average wind direction, 2 minute average , 0-360 degrees
      getValue("windspdmph_avg10m").",".// Average wind speed, 10 minute average , Mph
      getValue("winddir_avg10m").",".// Average wind direction, 10 minute average , 0-360 degrees
      getValue("windgustmphinterval").",". //Max Wind Speed in update interval, the default is one minute Mph

      getValue("eventrainin").",".// inches
      getValue("hourlyrainin").",".// inches
      getValue("dailyrainin").",".// inches
      getValue("weeklyrainin").",".// inches
      getValue("monthlyrainin").",".// inches
      getValue("yearlyrainin").",".// inches
      getValue("totalrain").",".// inches

      getValue("solarradiation").",". // W/m2
      getValue("uv").",".
      getValue("co2").",". //ppm
      getValue("co2_in").",". //indoor ppm
      getValue("co2_in_24h").",". //indoor 24 hour running average ppm

      getValue("pm25").",". //PM2.5 Air Quality Sensor µg/m3
      getValue("pm25_24h").",". //PM2.5 Air Quality Sensor 24 hour running average µg/m3
      getValue("pm25_in").",". //PM2.5 Air Quality Sensor indoor µg/m3
      getValue("pm25_in_24h").",". //PM2.5 Air Quality Sensor indoor 24 hour running average µg/m3
      getValue("pm10_in").",". //PM1.0 Air Quality Sensor indoor µg/m3
      getValue("pm10_in_24h").",". //PM1.0 Air Quality Sensor indoor 24 hour running average µg/m3

      getValue("pm_in_temp").",". //Indoor PM sensor temperature Fahrenheit
      getValue("pm_in_humidity").",". //Indoor PM sensor humidity Percentage µg/m3

      getValue("soiltemp1").",". //Fahrenheit
      getValue("soiltemp2").",". //Fahrenheit
      getValue("soiltemp3").",". //Fahrenheit
      getValue("soiltemp4").",". //Fahrenheit
      getValue("soiltemp5").",". //Fahrenheit
      getValue("soiltemp6").",". //Fahrenheit
      getValue("soiltemp7").",". //Fahrenheit
      getValue("soiltemp8").",". //Fahrenheit
      getValue("soiltemp9").",". //Fahrenheit
      getValue("soiltemp10").",". //Fahrenheit

      getValue("soilhum1").",". // Percentage
      getValue("soilhum2").",". // Percentage
      getValue("soilhum3").",". // Percentage
      getValue("soilhum4").",". // Percentage
      getValue("soilhum5").",". // Percentage
      getValue("soilhum6").",". // Percentage
      getValue("soilhum7").",". // Percentage
      getValue("soilhum8").",". // Percentage
      getValue("soilhum9").",". // Percentage
      getValue("soilhum10").",". // Percentage

      getValue("leak1").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
      getValue("leak2").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
      getValue("leak3").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
      getValue("leak4").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.

      getValue("lightning_time").",". // Last strike date and time,	Seconds since January 1, 1970
      getValue("lightning_day").",". // Number of strikes per day,	Seconds since January 1, 1970
      getValue("lightning_distance").",". // Distance of last strike,	Kilometers

      getValue("battout").",".//Low battery indication, outdoor sensor array or suite
      getValue("battin").",".//Low battery indication, indoor sensor or console
      getValue("batt1").",".//Low battery indication, sensor 1
      getValue("batt2").",".//Low battery indication, sensor 2
      getValue("batt3").",".//Low battery indication, sensor 3
      getValue("batt4").",".//Low battery indication, sensor 4
      getValue("batt5").",".//Low battery indication, sensor 5
      getValue("batt6").",".//Low battery indication, sensor 6
      getValue("batt7").",".//Low battery indication, sensor 7
      getValue("batt8").",".//Low battery indication, sensor 8
      getValue("batt9").",".//Low battery indication, sensor 9
      getValue("batt10").",".//Low battery indication, sensor 10
      getValue("battr1").",".//Low battery indication, relay 1
      getValue("battr2").",".//Low battery indication, relay 2
      getValue("battr3").",".//Low battery indication, relay 3
      getValue("battr4").",".//Low battery indication, relay 4
      getValue("battr5").",".//Low battery indication, relay 5
      getValue("battr6").",".//Low battery indication, relay 6
      getValue("battr7").",".//Low battery indication, relay 7
      getValue("battr8").",".//Low battery indication, relay 8
      getValue("battr9").",".//Low battery indication, relay 9
      getValue("battr10").",".//Low battery indication, relay 10
      getValue("batt_25").",".//Low battery indication, PM2.5
      getValue("batt_25in").",".//Low battery indication, PM2.5 indoor
      getValue("batleak1").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
      getValue("batleak2").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
      getValue("batleak3").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
      getValue("batleak4").",". // discrete 0 or 1 0=no leak 1=leak detected 2=loss of communication for over 10 minutes.
      getValue("batt_lightning").",".//Lighting detector battery
      getValue("battsm1").",".//Soil Moisture 1 battery
      getValue("battsm2").",".//Soil Moisture 2 battery
      getValue("battsm3").",".//Soil Moisture 3 battery
      getValue("battsm4").",".//Soil Moisture 4 battery
      getValue("battsm5").",".//Soil Moisture 5 battery
      getValue("battsm6").",".//Soil Moisture 6 battery
      getValue("battsm7").",".//Soil Moisture 7 battery
      getValue("battsm8").",".//Soil Moisture 8 battery
      getValue("battsm9").",".//Soil Moisture 9 battery
      getValue("battsm10").",".//Soil Moisture 10 battery
      getValue("battrain").")";//Rain Gauge battery

    if ($conn->query($sql2) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
      $fp = fopen(dirname(__FILE__). "/error.log", "w");
      fwrite($fp, date("l jS \of F Y h:i:s A"). " --- " . $conn->error); 
      fclose($fp);
    }
  }

  $conn->close();
?>
