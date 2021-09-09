<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Personal Weather Station</title>
        <link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
        
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    </head>

    <body>
    <div id="app">
        <div id="main">       
            <div class="page-heading">
                <div>
                    <button style="display:inline-block" type="button" onclick="loadSettings()" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#dark"><i class="fas fa-cog"></i>&nbsp;&nbsp;Settings</button>
                    <button style="display:inline-block" onclick="loadCharts()" class="btn btn-primary me-1 mb-1" id="HistoryBut"><i class="fas fa-chart-area"></i>&nbsp;&nbsp;Load History</button>
                    <!--<button style="display:inline-block" onclick="getLatest(false)" class="btn btn-primary me-1 mb-1" id="RefreshBut"><i class="fas fa-sync fa-spin"></i>&nbsp;&nbsp;Refresh</button>-->
                    <div style="display:inline-block" id="lastupdated"></div>
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:lightblue">
                                                    <i class="fas fa-sun" style="color:yellow"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Outdoor Temp</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="font-extrabold mb-0 mainlabel" id="OutdoorTemp"><div data-decimals="1" class="counter" data-target="0">0</div></h6>
                                                <div class="bottomstats">
                                                    <div>
                                                        <div class="label">Feels Like</div>
                                                        <div class="val">
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorReal" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">From Yesterday</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorTempYest" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Min</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorTempMin" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Max</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorTempMax" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:lightblue">
                                                    <i class="fas fa-tint" style="color:blue"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Outdoor Humidity</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="font-extrabold mb-0 mainlabel" id="OutdoorHum"><div class="counter" data-decimals="0" data-target="0" data-symbol=" %">0</div></h6>
                                                <div class="bottomstats">
                                                    <div>
                                                        <div class="label">Dew Point</div>
                                                        <div class="val">
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorDew" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">From Yesterday</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorHumYest" data-decimals="1" class="counter" data-target="0" data-symbol=" %">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Min</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorHumMin" data-decimals="1" class="counter" data-target="0" data-symbol=" %">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Max</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="OutdoorHumMax" data-decimals="1" class="counter" data-target="0" data-symbol=" %">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:darkgrey">
                                                    <i class="fas fa-home"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Indoor Temp</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="font-extrabold mb-0 mainlabel" id="IndoorTemp"><div data-decimals="1" class="counter" data-target="0">0</div></h6>
                                                <div class="bottomstats">
                                                    <div>
                                                        <div class="label">Feels Like</div>
                                                        <div class="val">
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorReal" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">From Yesterday</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorTempYest" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Min</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorTempMin" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Max</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorTempMax" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:darkgrey">
                                                    <i class="fas fa-tint" style="color:blue"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Indoor Humidity</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="font-extrabold mb-0 mainlabel" id="IndoorHum"><div class="counter" data-decimals="0" data-target="0" data-symbol=" %">0</div></h6>
                                                <div class="bottomstats">
                                                    <div>
                                                        <div class="label">Dew Point</div>
                                                        <div class="val">
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorDew" data-decimals="1" class="counter" data-target="0">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">From Yesterday</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorHumYest" data-decimals="1" class="counter" data-target="0" data-symbol=" %">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Min</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorHumMin" data-decimals="1" class="counter" data-target="0" data-symbol=" %">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="from ">
                                                            <div class="label">Max</div>
                                                            <span class="device-formatted-data-point fdp tempf ">
                                                                <div id="IndoorHumMax" data-decimals="1" class="counter" data-target="0" data-symbol=" %">0</div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                        <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card" style="height:420px;">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:lightblue">
                                                    <i class="fas fa-wind" style="color:blue"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Wind Direction & Speed</h6>
                                            </div>
                                        </div>
                                        <div  class="row">
                                            <div class="col-md-12">
                                                </br>
                                                <div id="compass">
                                                    <span>N</span>
                                                    <span>E</span>
                                                    <span>S</span>
                                                    <span>W</span>
                                                    <div class="centertext">
                                                        <span>
                                                            <div class="counter windspeed" data-decimals="2" data-target="0">0</div>
                                                            <div class="windunit"></div>
                                                            <div class="todaypeakwindtext" style="margin-top:10px">Today's Peak</div>
                                                            <div class="counter windspeedmax" data-decimals="2" data-target="0">0</div>
                                                        </span>
                                                    </div>
                                                    <div class="wind-widget" style="transform: rotate(0deg);"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='winddirection'></div>
                                        <div class='windgust'>
                                            <div><div>Gusts</div></br><div class="counter windgusts" data-decimals="2" data-target="0">0</div></div>
                                        </div>
                                        <div class='windchill'>
                                            <div><div>Wind Chill</div></br><div class="counter" id="OutdoorChill" data-decimals="1" data-target="0">0</div></div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card"  style="height:420px;">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row" style="position: relative;z-index:1">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:lightblue">
                                                    <i class="fab fa-cloudscale" style="color:darkblue"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Relative Air Pressure</h6>
                                            </div>
                                        </div>
                                        <div  class="row">
                                            <div class="col-md-12" style="position: relative;top: -40px;">
                                                </br>
                                                <div id="airpressure"></div>
                                            </div>
                                        </div>
                                        <div class='pressureperhour'>
                                            <div style="text-align: center;"><div>Hpa/hr</div></br><div class="counter presperh" style="width: auto;" data-decimals="1" data-target="0">0</div></div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card"  style="height:420px;">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row" style="position: relative;z-index:1">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:lightblue">
                                                    <i class="fas fa-sun" style="color:yellow"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Solar Radiation & UV</h6>
                                            </div>
                                        </div>
                                        <div  class="row">
                                            <div class="col-md-12" style="position: relative;top: -40px;">
                                                </br>
                                                <div class="sun">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                                <div class='uvindexcontainer' title="UV Index">
                                                    <div class='uvindex'></div>
                                                    <div class='wording'>UV Index</div>
                                                    <div class='exhighindex'></div>
                                                    <div class='veryhighindex'></div>
                                                    <div class='highindex'></div>
                                                    <div class='moderateindex'></div>
                                                    <div class='lowindex'></div>
                                                    <div class='wording'></div>
                                                </div>
                                                <h6 style="margin-top:-30px"><div class="counter solarlux mainlabel" data-decimals="0" data-target="0" data-symbol=" Lux">0</div></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <div class="card"  style="height:420px;">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row" style="position: relative;z-index:1">
                                            <div class="col-3">
                                                <div class="stats-icon" style="background-color:lightblue">
                                                    <i class="fas fa-cloud-rain" style="color:blue"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-muted font-semibold">Rain</h6>
                                            </div>
                                        </div>
                                        <div  class="row">
                                            <div class="col-md-12 rain-widget" style="position: relative;top: -40px;">
                                                </br>
                         
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>
                        
                        <div class="row chartRow">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="tempchartoutdoor" style="max-height:500px;height:500px;width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>

                        <div class="row chartRow">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="tempchartindoor" style="max-height:500px;height:500px;width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>

                        <div class="row chartRow">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="windchart1" style="max-height:500px;height:500px;width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>

                        <div class="row chartRow">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="windchart2" style="max-height:500px;height:500px;width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>

                        <div class="row chartRow">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="airchart" style="max-height:500px;height:500px;width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>

                        <div class="row chartRow">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5" style="position:relative">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="solarchart" style="max-height:500px;height:500px;width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>Crafted by <a href="http://armysarge.co.za">S. Scholtz</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="modal fade text-left" id="dark" tabindex="-1" aria-labelledby="myModalLabel150" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark white">
                    <span class="modal-title" id="myModalLabel150"><i class="fas fa-cog"></i>&nbsp;&nbsp;Settings</span>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form class="form" action="/">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Units:</label></br>
                                    <input type="radio" class="btn-check" name="options-outlined" onclick="setCookie('metric',0)" id="but-imp" autocomplete="off" checked="">
                                    <label style="width:124px;" class="btn btn-outline-success" for="but-imp">Imperial</label>
                                    <input type="radio" class="btn-check" name="options-outlined" onclick="setCookie('metric',1)" id="but-met" autocomplete="off">
                                    <label style="width:124px;" class="btn btn-outline-success" for="but-met">Metric</label>                             
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" onclick="window.location.reload()" class="btn btn-dark ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/highcharts/highcharts.js"></script>
    <script src="assets/vendors/highcharts/highcharts-more.js"></script>
    <script src="assets/vendors/highcharts/modules/boost.js"></script>
    <script src="assets/vendors/highcharts/modules/series-label.js"></script>
    <script src="assets/vendors/highcharts/modules/exporting.js"></script>
    <script src="assets/vendors/highcharts/modules/accessibility.js"></script>
    <script src="assets/vendors/highcharts/moment.js"></script>
    <script src="assets/js/main.js"></script>
</body>