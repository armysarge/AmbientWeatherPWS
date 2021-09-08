IndoorTemp = 0;
OutdoorTemp = 0;
UpdatedDate = new Date();
TempUnit = (typeof getCookie("metric") == "undefined"?"°F":(getCookie("metric") == 1)?"°C":"°F");
SpeedUnit = (typeof getCookie("metric") == "undefined"?"Mph":(getCookie("metric") == 1)?"Km/h":"Mph");
currentWeatherId = 0;
var interval = undefined;
var airpressureguage;
var tempindoorchart;
var tempoutdoorchart;
var windchart1;
var windchart2;
var windchart3;
var airchart;
var solarchart;

function runCounters(){
  refreshInterval = 100;
  speed = 1000;
  
  $(".counter").each(function() {
      _this = this;
      to = parseFloat($(_this).attr("data-target"));
      from = parseFloat($(_this).html());
      decimals = $(_this).attr("data-decimals");
      loops = Math.abs((from - to)*100);


      $(_this).html(to.toFixed(decimals))
      //console.log(to,from,loops);
      /*subtract = (to < from)

      interval = setInterval(updateTimer, 1);
      loopCount = 0;
      function updateTimer() {
        from = (subtract)?from - 0.01:from + 0.01;
        loopCount++;
        console.log(loopCount,loops,loopCount >= loops);
        if (loopCount >= loops) {
            clearInterval(interval);
            $( _this ).html(to.toFixed(decimals));
        }
      }   */  
  });
};

$(document).ready(function(){ 
    getLatest(true);
    //loadCharts();
    setInterval(getLatest,10000);
});

function getLatest(firstload){
  $("#RefreshBut").attr("disabled","disabled");
  $.ajax({
      url:"ajax.php",
      method:"get",
      success:function(data){
        if (currentWeatherId !== data.id){
          UpdatedDate = new Date();
          currentWeatherId = data.id;
          $(".trendIndicator").remove();
          // Indoor
          $("#IndoorTemp .counter").attr("data-target",convertTemp(data.IndoorTemp)).attr("data-symbol"," "+TempUnit);
          $("#IndoorTempMin").attr("data-target",convertTemp(data.IndoorTempMin)).attr("data-symbol"," "+TempUnit);
          $("#IndoorTempMax").attr("data-target",convertTemp(data.IndoorTempMax)).attr("data-symbol"," "+TempUnit);
          $("#IndoorHum .counter").attr("data-target",data.IndoorHum);
          $("#IndoorHumMin").attr("data-target",data.IndoorHumMin);
          $("#IndoorHumMax").attr("data-target",data.IndoorHumMax);
          $("#IndoorHumYest").attr("data-target",Math.abs(data.IndoorHumYest));
          $("#IndoorReal").attr("data-target",convertTemp(data.IndoorHeatIndex)).attr("data-symbol"," "+TempUnit);
          $("#IndoorDew").attr("data-target",convertTemp(data.IndoorDewPoint)).attr("data-symbol"," "+TempUnit);
          IndoorTempYest = (typeof getCookie("metric") == "undefined"?data.IndoorTempYestf:(getCookie("metric") == 1)?data.IndoorTempYestc:data.IndoorTempYestf);
          $("#IndoorTempYest").attr("data-target",Math.abs(IndoorTempYest)).attr("data-symbol"," "+TempUnit);
          addTrendIndicator(IndoorTempYest,"#IndoorTempYest");
          addTrendIndicator(data.IndoorHumYest,"#IndoorHumYest");
          if (typeof tempindoorchart !== "undefined" && !firstload) {
            //console.log(new Date(data.date),convertTemp(data.IndoorTemp));
            tempindoorchart.series[0].addPoint([data.date,convertTemp(data.IndoorTemp)],true,true);
            tempindoorchart.series[1].addPoint([data.date,convertTemp(data.IndoorHeatIndex)],true,true);
            tempindoorchart.series[2].addPoint([data.date,convertTemp(data.IndoorDewPoint)],true,true);
            tempindoorchart.series[3].addPoint([data.date,data.IndoorHum],true,true);
          }

          // Outdoor
          $("#OutdoorTemp .counter").attr("data-target",convertTemp(data.OutdoorTemp)).attr("data-symbol"," "+TempUnit);
          $("#OutdoorTempMin").attr("data-target",convertTemp(data.OutdoorTempMin)).attr("data-symbol"," "+TempUnit);
          $("#OutdoorTempMax").attr("data-target",convertTemp(data.OutdoorTempMax)).attr("data-symbol"," "+TempUnit);
          $("#OutdoorHum .counter").attr("data-target",data.OutdoorHum);
          $("#OutdoorHumMin").attr("data-target",data.OutdoorHumMin);
          $("#OutdoorHumMax").attr("data-target",data.OutdoorHumMax);
          $("#OutdoorHumYest").attr("data-target",Math.abs(data.OutdoorHumYest));
          $("#OutdoorReal").attr("data-target",convertTemp(data.OutdoorHeatIndex)).attr("data-symbol"," "+TempUnit);
          $("#OutdoorChill").attr("data-target",convertTemp(data.OutdoorWindChill)).attr("data-symbol"," "+TempUnit);
          $("#OutdoorDew").attr("data-target",convertTemp(data.OutdoorDewPoint)).attr("data-symbol"," "+TempUnit);
          OutdoorTempYest = (typeof getCookie("metric") == "undefined"?data.OutdoorTempYestf:(getCookie("metric") == 1)?data.OutdoorTempYestc:data.OutdoorTempYestf);
          $("#OutdoorTempYest").attr("data-target",Math.abs(OutdoorTempYest)).attr("data-symbol"," "+TempUnit);
          addTrendIndicator(OutdoorTempYest,"#OutdoorTempYest");
          addTrendIndicator(data.OutdoorHumYest,"#OutdoorHumYest");
          if (typeof tempoutdoorchart !== "undefined" && !firstload) {
            tempoutdoorchart.series[0].addPoint([data.date,convertTemp(data.OutdoorTemp)],true,true);
            tempoutdoorchart.series[1].addPoint([data.date,convertTemp(data.OutdoorHeatIndex)]),true,true;
            tempoutdoorchart.series[2].addPoint([data.date,convertTemp(data.OutdoorDewPoint)],true,true);
            tempoutdoorchart.series[3].addPoint([data.date,data.OutdoorHum],true,true);
          }

          //Solar Radiation
          SolarRadiationLux = Math.round(data.SolarRadiation/0.0079,0);
          SolarRadiationLuxMax = Math.round(data.SolarRadiationMax/0.0079,0);
          PercentageLux = Math.round(SolarRadiationLux/1000);
          if (typeof solarchart !== "undefined" && !firstload) {
            solarchart.series[0].addPoint([data.date,Math.round(data.SolarRadiation)],true,true);
            solarchart.series[1].addPoint([data.date,data.UV],true,true);
          }

          $(".sun").css({
            "background":"radial-gradient(transparent 50%, white), radial-gradient(yellow, transparent "+PercentageLux+"%)"
          });

          $(".sun > div").css({
            "-webkit-mask-image":"radial-gradient(black "+(PercentageLux-10)+"%, transparent "+PercentageLux+"%)",
            "mask-image":"radial-gradient(black "+(PercentageLux-10)+"%, transparent "+PercentageLux+"%)"
          });
        
          $(".solarlux").attr("data-target",SolarRadiationLux);

          $(".uvindex").html("<i class='fas fa-caret-left'>&nbsp;"+data.UV+"</i>");
          switch(true){
            case (data.UV <= 2):
              $(".uvindexcontainer .wording").last().html("Low");
              $(".uvindex").css("margin-top",((25*5)-1)+"px");
              break;
            case (data.UV > 2 && data.UV <= 5):
              $(".uvindexcontainer .wording").last().html("Moderate");      
              $(".uvindex").css("margin-top",((25*4)-1)+"px");
              break;  
            case (data.UV > 5 && data.UV <= 7):
              $(".uvindexcontainer .wording").last().html("High");
              $(".uvindex").css("margin-top",((25*3)-1)+"px");
              break;    
            case (data.UV > 7 && data.UV <= 10):
              $(".uvindexcontainer .wording").last().html("Very High");
              $(".uvindex").css("margin-top",((25*2)-1)+"px");
              break; 
            case (data.UV > 10):
              $(".uvindexcontainer .wording").last().html("Extremely High");
              $(".uvindex").css("margin-top","24px");
              break;                                                 
          }

          // Air Pressure
          PrevHourAirPressureDiffRel = data.BarometerRel - data.BarometerRelPreviousHour;
          PrevHourAirPressureDiffAbs = data.BarometerAbs - data.BarometerAbsPreviousHour;
          $(".presperh").attr("data-target",Math.abs(PrevHourAirPressureDiffRel));
          addTrendIndicator(PrevHourAirPressureDiffRel,".presperh");
          if (typeof airchart !== "undefined" && !firstload) {
            airchart.series[0].addPoint([data.date,data.BarometerRel],true,true);
          }

          //Wind Speed And Direction
          $("#compass .centertext > span .counter.windspeed").first().attr("data-target",convertSpeed(data.WindSpeed,false));
          $("#compass .centertext > span .counter.windspeedmax").first().attr("data-target",convertSpeed(data.WindSpeedMax,false)).attr("data-symbol"," "+SpeedUnit);
          $(".windunit").html(SpeedUnit);
          $(".wind-widget").css("transform","rotate("+data.WindDirection+"deg)");
          if (typeof windchart1 !== "undefined" && !firstload) {
            windchart1.series[0].addPoint([data.date,convertSpeed(data.WindSpeed)],true,true);
            windchart1.series[1].addPoint([data.date,convertSpeed(data.WindGust)],true,true);
          }
          if (typeof windchart2 !== "undefined" && !firstload) {
            windchart2.series[0].addPoint([data.date,data.WindDirection],true,true);
          }

          Wdir = "N";
          switch(true){
            case (data.WindDirection > 0 && data.WindDirection < 45 ):
              Wdir = "NNE";
              break;
            case (data.WindDirection == 45):
              Wdir = "NE";
              break; 
            case (data.WindDirection > 45 && data.WindDirection < 90 ): 
              Wdir = "ENE";
              break;               
            case (data.WindDirection == 90):
              Wdir = "E";
              break;
            case (data.WindDirection > 90 && data.WindDirection < 135 ):
              Wdir = "ESE";
              break;
            case (data.WindDirection == 135):
              Wdir = "SE";
              break; 
            case (data.WindDirection > 135 && data.WindDirection < 180 ): 
              Wdir = "SSE";
              break;               
            case (data.WindDirection == 180):
              Wdir = "S";
              break; 
            case (data.WindDirection > 180 && data.WindDirection < 225 ):
              Wdir = "SSW";
              break;
            case (data.WindDirection == 225):
              Wdir = "SW";
              break; 
            case (data.WindDirection > 225 && data.WindDirection < 270 ): 
              Wdir = "WSW";
              break;               
            case (data.WindDirection == 270):
              Wdir = "W";
              break;  
            case (data.WindDirection > 270 && data.WindDirection < 315 ):
              Wdir = "WNW";
              break;
            case (data.WindDirection == 315):
              Wdir = "NW";
              break; 
            case (data.WindDirection > 315 && data.WindDirection < 360 ): 
              Wdir = "NNW";
              break;                                             
          }
          $(".winddirection").html("From</br><span>"+Wdir+"</span>");
          $(".counter.windgusts").attr("data-target",convertSpeed(data.WindGust,false)).attr("data-symbol"," "+SpeedUnit);

          //Air PRessure         
          if (typeof airpressureguage !== "undefined" && !firstload) { // not destroyed
              var point = airpressureguage.series[0].points[0]
              point.update(data.BarometerRel);
          }else{
            airpressureguage = Highcharts.chart('airpressure', {

              chart: {
                  type: 'gauge',
                  alignTicks: false,
                  plotBackgroundColor: null,
                  plotBackgroundImage: null,
                  plotBorderWidth: 0,
                  plotShadow: false,
                  height:350,
                  margin:0
              },

              exporting: {
                enabled: false
              },
        
              title:{
                text:undefined
              },
        
              pane: {
                  startAngle: -150,
                  endAngle: 150
              },
        
              yAxis: [{
                  min: 925,
                  max: 1100,
                  lineColor: '#339',
                  tickColor: '#339',
                  minorTickColor: '#339',
                  offset: -25,
                  lineWidth: 1,
                  labels: {
                  },
                  tickLength: 5,
                  minorTickLength: 5,
                  endOnTick: false
              }],

              scrollbar: {
                liveRedraw: true
              },
        
              series: [{
                  name: 'Air pressure',
                  data: [data.BarometerRel],
                  dataLabels: {
                      styles:{
                        fontSize: '1.5rem'
                      },
                      formatter: function () {
                          return '<span style="color:#339">' + this.y + ' hpa</span><br/>';
                      },
                  },
                  tooltip: {
                      valueSuffix: ' hpa'
                  }
              }]
        
            }); 

            if(setLastUpdatedInterval)clearInterval(setLastUpdatedInterval);
            setLastUpdatedInterval = setInterval(function(){
              var numSeconds = Math.abs((UpdatedDate.getTime() - new Date().getTime()) / 1000);
              $("#lastupdated").html("Updated "+numSeconds.toFixed(0)+" "+((numSeconds == 1)?"second":"seconds")+" ago");
            },1000)
          }

          setTimeout(runCounters,100);
          $("#RefreshBut").removeAttr("disabled");
        }
      }
  });
}

function loadCharts(){
  $("#HistoryBut").attr("disabled","disabled");
  $("#HistoryBut").html("<i class='fas fa-sync fa-spin'></i>&nbsp;&nbsp;Loading, Please wait...");
  $.ajax({
    url:"/weather/chartData.php",
    method:"get",
    success:function(ajaxdata){
      solarchart = Highcharts.chart('solarchart', {
        time: {
          timezoneOffset: (ajaxdata.timezone*-1)*60
        },
        chart: {
          type: 'spline',
          zoomType: 'x',
          animation: Highcharts.svg
        },
    
        title: {
            text: 'Solar Radiation & UV'
        },

        scrollbar: {
          liveRedraw: true
        },

        /* plotOptions: {
          line: {
              dataLabels: {
                  enabled: true
              },
              enableMouseTracking: false
          }
        },*/
    
        tooltip: {
            valueDecimals: 1,
            formatter: function() {
              return '<b>'+this.series.name+'</b> for <b>' + (new Date(this.x)).toString().split("GMT")[0].trim() + '</b> was <b>' + this.y + ' ' + (typeof this.series.userOptions.tooltip != "undefined"?this.series.userOptions.tooltip.valueSuffix + " ("+(Math.round(this.y/0.0079,0))+" Lux)":"") + '</b>';
            }
        },
    
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150
        },

        yAxis: [{ // Primary yAxis
          labels: {
              format: '{value} w/m2',
              style: {
                  color: "red"
              }
          },
          title: {
              text: 'Watt Per Square Meter',
              style: {
                  color: "red"
              }
          }
        }, { // Secondary yAxis
            title: {
                text: 'UV Index',
                style: {
                    color: "blue"
                }
            },
            labels: {
                format: '{value}',
                style: {
                    color: "blue"
                }
            },
            opposite: true
        }],

        legend: {
          layout: 'vertical',
          align: 'left',
          x: 120,
          verticalAlign: 'top',
          y: 100,
          floating: true,
          backgroundColor:
              Highcharts.defaultOptions.legend.backgroundColor || // theme
              'rgba(255,255,255,0.25)'
        },

        series: [{
          name: 'Watt Per Square Meter',
          type: 'spline',
          color:"red",
          data: ajaxdata.SolarRadiation1Data.reverse(),
          tooltip: {
              valueSuffix: ' w/m2'
          }
        }, {
            name: 'UV Index',
            type: 'spline',
            yAxis: 1,
            color:"blue",
            data: ajaxdata.SolarRadiation2Data.reverse(),
        }]            
      });      

      tempoutdoorchart = Highcharts.chart('tempchartoutdoor', {
        time: {
          timezoneOffset: (ajaxdata.timezone*-1)*60
        },
        chart: {
          type: 'spline',
          zoomType: 'x',
          animation: Highcharts.svg
        },
    
        title: {
            text: 'Outdoor'
        },

        scrollbar: {
          liveRedraw: true
        },

        /* plotOptions: {
          line: {
              dataLabels: {
                  enabled: true
              },
              enableMouseTracking: false
          }
        },*/
    
        tooltip: {
            valueDecimals: 1,
            formatter: function() {
              return '<b>'+this.series.name+'</b> for <b>' + (new Date(this.x)).toString().split("GMT")[0].trim() + '</b> was <b>' + this.y + (this.series.name == "Relative Humidity"?" %":" "+TempUnit) + '</b>';
            }
        },
    
        xAxis: [{
            type: 'datetime'
        },{
            type: 'datetime'
        }],

        yAxis: [{
          tickAmount: 6,
          title: { text: "Degrees "+TempUnit }
        },{ // Secondary yAxis
          min:0,
          tickAmount: 6,
          tickPixelInterval: 150,
          alignTicks: false,
          title: {
              text: 'Humidity Percentage',
              style: {
                  color: "blue"
              }
          },
          labels: {
              format: '{value}',
              style: {
                  color: "blue"
              }
          },
          opposite: true
        }],
    
        series: [{
            data: convertArrTemp(ajaxdata.TempOutdoor1Data),
            lineWidth: 0.5,
            name: 'Temperature',
            color:"green"
        },{
          data: convertArrTemp(ajaxdata.TempOutdoor2Data),
          lineWidth: 0.5,
          name: 'Heat Index',
          zIndex:-1,
          color:"red"
        },{
          data: convertArrTemp(ajaxdata.TempOutdoor3Data),
          lineWidth: 0.5,
          name: 'Dew Point',
          color:"lightblue"
        }, {
          name: 'Relative Humidity',
          yAxis: 1,
          type: 'spline',
          data: ajaxdata.Humidity2Data.reverse(),
        }]
    
      });

      tempindoorchart = Highcharts.chart('tempchartindoor', {
        time: {
          timezoneOffset: (ajaxdata.timezone*-1)*60
        },
        
        chart: {
          type: 'spline',
          zoomType: 'x',
          animation: Highcharts.svg
        },
    
        title: {
            text: 'Indoor Temperatures'
        },

        scrollbar: {
          liveRedraw: true
        },
    
        tooltip: {
            valueDecimals: 1,
            formatter: function() {
              return '<b>'+this.series.name+'</b> for <b>' + (new Date(this.x)).toString().split("GMT")[0].trim() + '</b> was <b>' + this.y  + (this.series.name == "Relative Humidity"?" %":" "+TempUnit) + '</b>';
            }
        },
    
        xAxis: {
            type: 'datetime'
        },

        yAxis: [{
          tickAmount: 6,
          title: { text: "Degrees "+TempUnit }
        },{ // Secondary yAxis
          min:0,
          tickAmount: 6,
          tickPixelInterval: 150,
          alignTicks: false,
          title: {
              text: 'Humidity Percentage',
              style: {
                  color: "blue"
              }
          },
          labels: {
              format: '{value}',
              style: {
                  color: "blue"
              }
          },
          opposite: true
        }],
    
        series: [{
          data: convertArrTemp(ajaxdata.TempIndoor1Data),
          lineWidth: 0.5,
          name: 'Temperature',
          color:"green"
        },{
          data: convertArrTemp(ajaxdata.TempIndoor2Data),
          lineWidth: 0.5,
          name: 'Heat Index',
          zIndex:-1,         
          color:"red"
        },{
          data: convertArrTemp(ajaxdata.TempIndoor3Data),
          lineWidth: 0.5,
          name: 'Dew Point',      
          color:"lightblue"
        }, {
          name: 'Relative Humidity',
          yAxis: 1,
          type: 'spline',
          data: ajaxdata.Humidity1Data.reverse(),
        }]
    
      });

      allplotbands = [{
        from: 0,
        to: ((getCookie("metric") == 1)?1.6:1),
        color: 'rgba(68, 170, 213, 0.1)',
        label: {
            text: 'Calm',
            style: {
                color: '#606060'
            }
        }
      },{ 
        from: ((getCookie("metric") == 1)?1.6:1),
        to: ((getCookie("metric") == 1)?5.6:3.5),
        color: 'rgba(0, 0, 0, 0)',
        label: {
            text: 'Light air',
            style: {
                color: '#606060'
            }
        }
      }, { // Light breeze
          from: ((getCookie("metric") == 1)?5.6:3.5),
          to: ((getCookie("metric") == 1)?12:7.5),
          color: 'rgba(68, 170, 213, 0.1)',
          label: {
              text: 'Light breeze',
              style: {
                  color: '#606060'
              }
          }
      }, { // Gentle breeze
          from: ((getCookie("metric") == 1)?12:7.5),
          to: ((getCookie("metric") == 1)?19.4:12),
          color: 'rgba(0, 0, 0, 0)',
          label: {
              text: 'Gentle breeze',
              style: {
                  color: '#606060'
              }
          }
      }, { // Moderate breeze
          from: ((getCookie("metric") == 1)?19.4:12),
          to: ((getCookie("metric") == 1)?28.9:18),
          color: 'rgba(68, 170, 213, 0.1)',
          label: {
              text: 'Moderate breeze',
              style: {
                  color: '#606060'
              }
          }
      }, { // Fresh breeze
          from: ((getCookie("metric") == 1)?28.9:18),
          to: ((getCookie("metric") == 1)?38.6:24),
          color: 'rgba(0, 0, 0, 0)',
          label: {
              text: 'Fresh breeze',
              style: {
                  color: '#606060'
              }
          }
      }, { // Strong breeze
          from: ((getCookie("metric") == 1)?38.6:24),
          to: ((getCookie("metric") == 1)?49.8:31),
          color: 'rgba(68, 170, 213, 0.1)',
          label: {
              text: 'Strong breeze',
              style: {
                  color: '#606060'
              }
          }
      }, { // Moderate gale
          from: ((getCookie("metric") == 1)?49.8:31),
          to: ((getCookie("metric") == 1)?61.1:38),
          color: 'rgba(0, 0, 0, 0)',
          label: {
              text: 'Moderate gale',
              style: {
                  color: '#606060'
              }
          }
      }, { // Fresh gale
        from: ((getCookie("metric") == 1)?61.1:38),
        to: ((getCookie("metric") == 1)?74:46),
        color: 'rgba(68, 170, 213, 0.1)',
        label: {
            text: 'Fresh gale',
            style: {
                color: '#606060'
            }
        }
      }, { // Strong gale
        from: ((getCookie("metric") == 1)?74:46),
        to: ((getCookie("metric") == 1)?86.9:54),
        color: 'rgba(0, 0, 0, 0)',
        label: {
            text: 'Strong gale',
            style: {
                color: '#606060'
            }
        }
      }, { // Whole gale
        from:((getCookie("metric") == 1)?86.9:54),
        to: ((getCookie("metric") == 1)?101.3:63),
        color: 'rgba(68, 170, 213, 0.1)',
        label: {
            text: 'Whole gale',
            style: {
                color: '#606060'
            }
        }
      }, { // Storm
        from: ((getCookie("metric") == 1)?101.3:63),
        to: ((getCookie("metric") == 1)?117.4:73),
        color: 'rgba(0, 0, 0, 0)',
        label: {
            text: 'Storm',
            style: {
                color: '#606060'
            }
        }
      }, { // Hurricane
        from: ((getCookie("metric") == 1)?117.4:73),
        color: 'rgba(68, 170, 213, 0.1)',
        label: {
            text: 'Hurricane',
            style: {
                color: '#606060'
            }
        }
      }];

      windchart1 = Highcharts.chart('windchart1', {

        title: {
            text: 'Wind Speed & Gusts'
        },

        chart: {
          type: 'spline',
          zoomType: 'x',
          animation: Highcharts.svg,
          scrollablePlotArea: {
            minWidth: 600,
            scrollPositionX: 1
          }
        },

        plotOptions: {
          spline: {
              lineWidth: 4,
              states: {
                  hover: {
                      lineWidth: 5
                  }
              },
              marker: {
                  enabled: false
              }
          }
        },

        time: {
          timezoneOffset: (ajaxdata.timezone*-1)*60
        },
    
        xAxis: [{
            type: 'datetime',
            tickPixelInterval: 150,
            alignTicks: false
        },{
          type: 'datetime',
          tickPixelInterval: 150,
          alignTicks: false
        }],
    
        yAxis: [{
            title: { text: SpeedUnit },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: allplotbands
        }],

        scrollbar: {
          liveRedraw: true
        },

        tooltip: {
          valueDecimals: 1,
          formatter: function() {
            return '<b>'+this.series.name+'</b> for <b>' + (new Date(this.x)).toString().split("GMT")[0].trim() + '</b> was <b>' + this.y + ' '+SpeedUnit+'</b>';
          }
        },
    
        series: [{
            name: 'Wind Speed',
            type: 'spline',
            zIndex: -1,
            data: convertArrSpeed(ajaxdata.Wind1Data),
        }, {
            name: 'Wind Gusts',
            type: 'scatter',
            data: convertArrSpeed(ajaxdata.Wind2Data),
        }]
      });

      windchart2 = Highcharts.chart('windchart2', {

        title: {
            text: 'Wind Direction'
        },

        chart: {
          type: 'spline',
          zoomType: 'x',
          animation: Highcharts.svg,
          alignTicks: false,
          scrollablePlotArea: {
            minWidth: 600,
            scrollPositionX: 1
          }
        },

        plotOptions: {
          spline: {
              lineWidth: 4,
              states: {
                  hover: {
                      lineWidth: 5
                  }
              },
              marker: {
                  enabled: false
              }
          }
        },

        time: {
          timezoneOffset: (ajaxdata.timezone*-1)*60
        },
    
        xAxis: [{
          type: 'datetime',
        }],
    
        yAxis: [{
          title: { text: "Degrees" },
          max:360,
          tickPixelInterval: 45,
          tickAmount: 10,
          alignTicks: false,
          minorGridLineWidth: 0,
          gridLineWidth: 0,
          alternateGridColor: null,
          plotBands: [{
            from: 0,
            to: 45,
            color: 'rgba(68, 170, 213, 0.1)',
            label: {
                text: 'North',
                style: {
                    color: '#606060'
                }
            }
          },{ 
            from: 45,
            to: 135,
            color: 'rgba(0, 0, 0, 0)',
            label: {
                text: 'East',
                style: {
                    color: '#606060'
                }
            }
          }, { 
              from: 135,
              to: 225,
              color: 'rgba(68, 170, 213, 0.1)',
              label: {
                  text: 'South',
                  style: {
                      color: '#606060'
                  }
              }
          }, { 
              from: 225,
              to: 315,
              color: 'rgba(0, 0, 0, 0)',
              label: {
                  text: 'West',
                  style: {
                      color: '#606060'
                  }
              }
          }, { 
            from: 315,
            to: 360,
            color: 'rgba(68, 170, 213, 0.1)',
            label: {
                text: 'North',
                style: {
                    color: '#606060'
                }
            }
          }]
        }],

        scrollbar: {
          liveRedraw: true
        },

        tooltip: {
          valueDecimals: 1,
          formatter: function() {
            return '<b>'+this.series.name+'</b> for <b>' + (new Date(this.x)).toString().split("GMT")[0].trim() + '</b> was <b>' + this.y + ' degrees</b>';
          }
        },
    
        series: [{
            name: 'Wind Direction',
            type: 'scatter',
            data: ajaxdata.Wind3Data,
        }]
      });

      airchart = Highcharts.chart('airchart', {
        time: {
          timezoneOffset: (ajaxdata.timezone*-1)*60
        },
        
        chart: {
          type: 'spline',
          zoomType: 'x',
          animation: Highcharts.svg,
        },
    
        title: {
            text: 'Air Pressure'
        },

        scrollbar: {
          liveRedraw: true
        },
    
        tooltip: {
            valueDecimals: 1,
            formatter: function() {
              return '<b>'+this.series.name+'</b> for <b>' + (new Date(this.x)).toString().split("GMT")[0].trim() + '</b> was <b>' + this.y + ' hpa</b>';
            }
        },
    
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
        },

        yAxis: [{
          title: { text: "Hpa"}
        }],
    
        series: [{
          data: ajaxdata.AirPressure1Data.reverse(),
          lineWidth: 0.5,
          name: 'Air Pressure',
          color:"green"
        }]
    
      });
      $(".chartRow").fadeIn();
      $([document.documentElement, document.body]).animate({
        scrollTop: $(".chartRow").first().offset().top
      }, 1000);
      $("#HistoryBut").remove();
    }
  });
}

function convertArrTemp(arr){
  $.each(arr,function(index,value){
    arr[index][1] = parseFloat(convertTemp(value[1]));
  });
  return arr.reverse();
}


function convertArrSpeed(arr){
  $.each(arr,function(index,value){
    arr[index][1] = parseFloat(convertSpeed(value[1]));
  });
  return arr.reverse();
}

function addTrendIndicator(value,el){
  switch(true){
    case (value < 0):
      $(el).before("<i class='trendIndicator fas fa-arrow-circle-down' style='color:red'></i>")
      break;
    case (value == 0):
      $(el).before("<i class='trendIndicator fas fa-minus-circle' style='color:blue'></i>")
      break;
    case (value > 0):
      $(el).before("<i class='trendIndicator fas fa-arrow-circle-up' style='color:green'></i>")
      break;            
  }
}

function loadSettings(){
  Metric = getCookie("metric");
  Metric = (typeof Metric == "undefined"?0:Metric);
  if(Metric == 1){
    $("#but-imp")[0].checked = false;
    $("#but-met")[0].checked = true;
  }else{
    $("#but-imp")[0].checked = true;
    $("#but-met")[0].checked = false;
  }
}

function convertTemp(val){
  Metric = getCookie("metric");
  Metric = (typeof Metric == "undefined"?0:Metric);
  val = (Metric == 1)?((val-32)*(5/9)).toFixed(1):val.toFixed(1);
  return parseFloat(val);
}

function convertSpeed(val,reverse){
  Metric = getCookie("metric");
  Metric = (typeof Metric == "undefined"?0:Metric);
  if (reverse) Metric = !Metric
  val = (Metric == 1)?(val*1.609344).toFixed(2):val.toFixed(2);
  return parseFloat(val);
}

function setCookie(cname, cvalue) {
  const d = new Date();
  //d.setTime(d.getTime() + (exdays*24*60*60*1000));
  //let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";"/* + expires + ";*/+"path=/";

  TempUnit = (typeof getCookie("metric") == "undefined"?"°F":(getCookie("metric") == 1)?"°C":"°F");
  SpeedUnit = (typeof getCookie("metric") == "undefined"?"Mph":(getCookie("metric") == 1)?"Km/h":"Mph");
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

var setLastUpdatedInterval;

function slideToggle(t,e,o){0===t.clientHeight?j(t,e,o,!0):j(t,e,o)}function slideUp(t,e,o){j(t,e,o)}function slideDown(t,e,o){j(t,e,o,!0)}function j(t,e,o,i){void 0===e&&(e=400),void 0===i&&(i=!1),t.style.overflow="hidden",i&&(t.style.display="block");var p,l=window.getComputedStyle(t),n=parseFloat(l.getPropertyValue("height")),a=parseFloat(l.getPropertyValue("padding-top")),s=parseFloat(l.getPropertyValue("padding-bottom")),r=parseFloat(l.getPropertyValue("margin-top")),d=parseFloat(l.getPropertyValue("margin-bottom")),g=n/e,y=a/e,m=s/e,u=r/e,h=d/e;window.requestAnimationFrame(function l(x){void 0===p&&(p=x);var f=x-p;i?(t.style.height=g*f+"px",t.style.paddingTop=y*f+"px",t.style.paddingBottom=m*f+"px",t.style.marginTop=u*f+"px",t.style.marginBottom=h*f+"px"):(t.style.height=n-g*f+"px",t.style.paddingTop=a-y*f+"px",t.style.paddingBottom=s-m*f+"px",t.style.marginTop=r-u*f+"px",t.style.marginBottom=d-h*f+"px"),f>=e?(t.style.height="",t.style.paddingTop="",t.style.paddingBottom="",t.style.marginTop="",t.style.marginBottom="",t.style.overflow="",i||(t.style.display="none"),"function"==typeof o&&o()):window.requestAnimationFrame(l)})}

let sidebarItems = document.querySelectorAll('.sidebar-item.has-sub');
for(var i = 0; i < sidebarItems.length; i++) {
    let sidebarItem = sidebarItems[i];
	sidebarItems[i].querySelector('.sidebar-link').addEventListener('click', function(e) {
        e.preventDefault();
        
        let submenu = sidebarItem.querySelector('.submenu');
        if( submenu.classList.contains('active') ) submenu.style.display = "block"

        if( submenu.style.display == "none" ) submenu.classList.add('active')
        else submenu.classList.remove('active')
        slideToggle(submenu, 300)
    })
}

/**
 * Sidebar Wrapper
 */
const Sidebar = function (sidebarEL) {
  /**
   * Sidebar Element
   * @param  {HTMLElement} sidebarEL
   */
  this.sidebarEL = sidebarEL instanceof HTMLElement ? sidebarEL : document.querySelector(sidebarEL);

  /**
   * Init Sidebar
   */
  this.init = function () {
    // add event listener to sidebar
    document.querySelector('.burger-btn').addEventListener('click', this.toggle.bind(this));
    document.querySelector('.sidebar-hide').addEventListener('click', this.toggle.bind(this));
    window.addEventListener('resize', this.onResize.bind(this));

    // Perfect Scrollbar Init
    if(typeof PerfectScrollbar == 'function') {
      const container = document.querySelector(".sidebar-wrapper");
      const ps = new PerfectScrollbar(container, {
          wheelPropagation: false
      });
    }

    // Scroll into active sidebar
    setTimeout(() => document.querySelector('.sidebar-item.active').scrollIntoView(false), 100);

    // check responsive
    this.OnFirstLoad();

    // 
    return this;
  }

  /**
   * OnFirstLoad
   */
  this.OnFirstLoad = function () {
    var w = window.innerWidth;
    if(w < 1200) {
      this.sidebarEL.classList.remove('active');
    }
  }

  /**
   * OnRezise Sidebar
   */
  this.onResize = function () {
    var w = window.innerWidth;
    if(w < 1200) {
      this.sidebarEL.classList.remove('active');
    } else {
      this.sidebarEL.classList.add('active');
    }
    // reset 
    this.deleteBackdrop();
    this.toggleOverflowBody(true);
  }

  /**
   * Toggle Sidebar
   */
  this.toggle = function () {
    const sidebarState = this.sidebarEL.classList.contains('active');
    if (sidebarState) {
      this.hide();
    } else {
      this.show();
    }
  }

  /**
   * Show Sidebar
   */
  this.show = function () {
    this.sidebarEL.classList.add('active');
    this.createBackdrop();
    this.toggleOverflowBody();
  }

  /**
   * Hide Sidebar
   */
  this.hide = function () {
    this.sidebarEL.classList.remove('active');
    this.deleteBackdrop();
    this.toggleOverflowBody();
  }


  /**
   * Create Sidebar Backdrop
   */
  this.createBackdrop = function () {
    this.deleteBackdrop();
    const backdrop = document.createElement('div');
    backdrop.classList.add('sidebar-backdrop');
    backdrop.addEventListener('click', this.hide.bind(this));
    document.body.appendChild(backdrop);
  }

  /**
   * Delete Sidebar Backdrop
   */
  this.deleteBackdrop = function () {
    const backdrop = document.querySelector('.sidebar-backdrop');
    if (backdrop) {
      backdrop.remove();
    }
  }

  /**
   * Toggle Overflow Body
   */
  this.toggleOverflowBody = function (active) {
    const sidebarState = this.sidebarEL.classList.contains('active');
    const body = document.querySelector('body');
    if (typeof active == 'undefined') {
      body.style.overflowY = sidebarState ? 'hidden' : 'auto';
    } else {
      body.style.overflowY = active ? 'auto' : 'hidden';
    }
  }
}


/**
 * Create Sidebar Wrapper
*/
let sidebarEl = document.getElementById('sidebar');
if (sidebarEl) {
  window.sidebar = new Sidebar(sidebarEl).init();
}