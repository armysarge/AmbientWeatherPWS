IndoorTemp = 0;
OutdoorTemp = 0;
UpdatedDate = new Date();

$(document).ready(function(){
    getLatest();
    setInterval(getLatest,60000);
    setInterval(setLastUpdated,1000);
});

function getLatest(){
    $.ajax({
        url:"/weather/ajax.php",
        method:"get",
        success:function(data){
            UpdatedDate = new Date();
            // Indoor Temp
            $("#IndoorTemp").html(data.IndoorTemp);
            $("#IndoorTempDiff").html((data.IndoorTemp-IndoorTemp).toFixed(3));
            IndoorTemp = data.IndoorTemp;
            // Outdoor Temp
            $("#OutdoorTemp").html(data.OutdoorTemp);
            $("#OutdoorTempDiff").html((data.OutdoorTemp-OutdoorTemp).toFixed(3));
            OutdoorTemp = data.OutdoorTemp;
        }
    });
}

function setLastUpdated(){
    NowDate = new Date();
    var numSeconds = Math.abs((UpdatedDate.getTime() - NowDate.getTime()) / 1000);
    $("#lastupdated").html("Updated "+numSeconds.toFixed(0)+" "+((numSeconds == 1)?"second":"seconds")+" ago");
}