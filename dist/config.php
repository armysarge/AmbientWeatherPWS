<?php
$servername = "shaunpi";
$username = "pi";
$password = "pipassword";
$dbname = "ShaunPI";
$dbtable = "Weather";
$timezone = 2;
$hemisphere = "south"; // 'north' or 'south'


// PHP FUNCTIONS
function calcHI($T,$rh){ // Heat Index
    $result = $T;
    if ($T >= 80 && $rh >= 40)
    {
        $c1 = -42.379;
        $c2 = 2.04901523;
        $c3 = 10.14333127;
        $c4 = -0.22475541;
        $c5 = -6.83783 * pow(10, -3);
        $c6 = -5.481717 * pow(10, -2);
        $c7 = 1.22874 * pow(10, -3);
        $c8 = 8.5282 * pow(10, -4);
        $c9 = -1.99 * pow(10, -6);
      
        $hi = $c1 + $c2*$T + $c3*$rh + $c4*$T*$rh + $c5*$T*$T + $c6*$rh*$rh + $c7*$T*$T*$rh + $c8*$T*$rh*$rh + $c9*$T*$T*$rh*$rh;
            
        $result = round($hi,2);
    }
    return $result;
}

function calcDP($T,$rh){ // Dew Point
    $tempc2 = ($T - 32) * .556;
    $rh2 = 1 - $rh/100;
    $Tdpc2 = $tempc2 - (((14.55 + .114*$tempc2)*$rh2) + (pow(((2.5 + .007*$tempc2)*$rh2), 3)) + ((15.9 + .117*$tempc2))*(pow($rh2, 14)));
    return round(1.80 * $Tdpc2 + 32.0,2);
}

function calcWC($tempF,$Wind){ // Wind Chill
    return (($tempF < 70 && $Wind > 3)?round(35.74+0.6215*$tempF-35.75*pow($Wind,0.16)+0.4275*$tempF*pow($Wind,0.16),1):$tempF);
}

function convertToCelcius($val){
    return (floatval($val)-32)*(5/9);
}
?>