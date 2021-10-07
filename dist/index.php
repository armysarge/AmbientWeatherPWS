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
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-FTPPKWJ7MW"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FTPPKWJ7MW');
        </script>
    </head>

    <body>

    <div class="preloader" style="opacity: 1; ">
        <svg version="1.1" id="sun" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="10px" viewBox="0 0 10 10" enable-background="new 0 0 10 10" xml:space="preserve" style="opacity: 1; margin-left: 0px; margin-top: 0px;">
            <g>
            <path fill="none" d="M6.942,3.876c-0.4-0.692-1.146-1.123-1.946-1.123c-0.392,0-0.779,0.104-1.121,0.301c-1.072,0.619-1.44,1.994-0.821,3.067C3.454,6.815,4.2,7.245,5,7.245c0.392,0,0.779-0.104,1.121-0.301C6.64,6.644,7.013,6.159,7.167,5.581C7.321,5,7.243,4.396,6.942,3.876z M6.88,5.505C6.745,6.007,6.423,6.427,5.973,6.688C5.676,6.858,5.34,6.948,5,6.948c-0.695,0-1.343-0.373-1.69-0.975C2.774,5.043,3.093,3.849,4.024,3.312C4.32,3.14,4.656,3.05,4.996,3.05c0.695,0,1.342,0.374,1.69,0.975C6.946,4.476,7.015,5,6.88,5.505z"></path>
            <path fill="none" d="M8.759,2.828C8.718,2.757,8.626,2.732,8.556,2.774L7.345,3.473c-0.07,0.041-0.094,0.132-0.053,0.202C7.319,3.723,7.368,3.75,7.419,3.75c0.025,0,0.053-0.007,0.074-0.02l1.211-0.699C8.774,2.989,8.8,2.899,8.759,2.828z"></path>
            <path fill="none" d="M1.238,7.171c0.027,0.047,0.077,0.074,0.128,0.074c0.025,0,0.051-0.008,0.074-0.02l1.211-0.699c0.071-0.041,0.095-0.133,0.054-0.203S2.574,6.228,2.503,6.269l-1.21,0.699C1.221,7.009,1.197,7.101,1.238,7.171z"></path>
            <path fill="none" d="M6.396,2.726c0.052,0,0.102-0.026,0.13-0.075l0.349-0.605C6.915,1.976,6.89,1.885,6.819,1.844c-0.07-0.042-0.162-0.017-0.202,0.054L6.269,2.503C6.228,2.574,6.251,2.666,6.322,2.706C6.346,2.719,6.371,2.726,6.396,2.726z"></path>
                <path fill="none" d="M3.472,7.347L3.123,7.952c-0.041,0.07-0.017,0.162,0.054,0.203C3.2,8.169,3.226,8.175,3.25,8.175c0.052,0,0.102-0.027,0.129-0.074l0.349-0.605c0.041-0.07,0.017-0.16-0.054-0.203C3.603,7.251,3.513,7.276,3.472,7.347z"></path>
                <path fill="none" d="M3.601,2.726c0.025,0,0.051-0.007,0.074-0.02C3.746,2.666,3.77,2.574,3.729,2.503l-0.35-0.604C3.338,1.828,3.248,1.804,3.177,1.844C3.106,1.886,3.082,1.976,3.123,2.047l0.35,0.604C3.5,2.7,3.549,2.726,3.601,2.726z"></path>
                <path fill="none" d="M6.321,7.292c-0.07,0.043-0.094,0.133-0.054,0.203l0.351,0.605c0.026,0.047,0.076,0.074,0.127,0.074c0.025,0,0.051-0.006,0.074-0.02c0.072-0.041,0.096-0.133,0.055-0.203l-0.35-0.605C6.483,7.276,6.393,7.253,6.321,7.292z"></path>
                <path fill="none" d="M2.202,5.146c0.082,0,0.149-0.065,0.149-0.147S2.284,4.851,2.202,4.851H1.503c-0.082,0-0.148,0.066-0.148,0.148s0.066,0.147,0.148,0.147H2.202z"></path>
                <path fill="none" d="M8.493,4.851H7.794c-0.082,0-0.148,0.066-0.148,0.148s0.066,0.147,0.148,0.147l0,0h0.699c0.082,0,0.148-0.065,0.148-0.147S8.575,4.851,8.493,4.851L8.493,4.851z"></path>
                <path fill="none" d="M5.146,2.203V0.805c0-0.082-0.066-0.148-0.148-0.148c-0.082,0-0.148,0.066-0.148,0.148v1.398c0,0.082,0.066,0.149,0.148,0.149C5.08,2.352,5.146,2.285,5.146,2.203z"></path>
                <path fill="none" d="M4.85,7.796v1.396c0,0.082,0.066,0.15,0.148,0.15c0.082,0,0.148-0.068,0.148-0.15V7.796c0-0.082-0.066-0.148-0.148-0.148C4.917,7.647,4.85,7.714,4.85,7.796z"></path>
                <path fill="none" d="M2.651,3.473L1.44,2.774C1.369,2.732,1.279,2.757,1.238,2.828C1.197,2.899,1.221,2.989,1.292,3.031l1.21,0.699c0.023,0.013,0.049,0.02,0.074,0.02c0.051,0,0.101-0.026,0.129-0.075C2.747,3.604,2.722,3.514,2.651,3.473z"></path>
                <path fill="none" d="M8.704,6.968L7.493,6.269c-0.07-0.041-0.162-0.016-0.201,0.055c-0.041,0.07-0.018,0.162,0.053,0.203l1.211,0.699c0.023,0.012,0.049,0.02,0.074,0.02c0.051,0,0.102-0.027,0.129-0.074C8.8,7.101,8.776,7.009,8.704,6.968z"></path>
            </g>
        </svg>

        <svg version="1.1" id="cloud" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="10px" viewBox="0 0 10 10" enable-background="new 0 0 10 10" xml:space="preserve">
            <path fill="none" d="M8.528,5.624H8.247c-0.085,0-0.156-0.068-0.156-0.154c0-0.694-0.563-1.257-1.257-1.257c-0.098,0-0.197,0.013-0.3,0.038C6.493,4.259,6.45,4.252,6.415,4.229C6.38,4.208,6.356,4.172,6.348,4.131C6.117,3.032,5.135,2.235,4.01,2.235c-1.252,0-2.297,0.979-2.379,2.23c-0.004,0.056-0.039,0.108-0.093,0.13C1.076,4.793,0.776,5.249,0.776,5.752c0,0.693,0.564,1.257,1.257,1.257h6.495c0.383,0,0.695-0.31,0.695-0.692S8.911,5.624,8.528,5.624z"></path>
        </svg>

        <div class="rain">
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
            <span class="drop"></span>
        </div>
        
        <div class="text-muted font-semibold" style="text-align:center;">
            LOOKING OUTSIDE FOR YOU... ONE SEC
        </div>
    </div>


    <div id="app" style="display:none">
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
                                                <div style='margin-top:35px;width: 100%;text-align: center;'>
                                                    <div class="rain-wrap">
                                                        <div id="glasscontainer">
                                                            <div id="glass">
                                                                <div id="water"></div>
                                                            </div>
                                                        </div>
                                                        <div class="wrap">
                                                            <span class="device-formatted-data-point fdp">
                                                                <div id="hourlyrain" data-decimals="2" class="counter" data-target="0">0</div>
                                                            </span>
                                                            <div class="label rate">Rate</div>
                                                        </div>
                                                    </div>
                                                    <div class="rain-wrap">
                                                        <div id="glasscontainer">
                                                            <div id="glass">
                                                                <div id="water"></div>
                                                            </div>
                                                        </div>
                                                        <div class="wrap">
                                                            <span class="device-formatted-data-point fdp">
                                                                <div id="dailyrain" data-decimals="2" class="counter" data-target="0">0</div>
                                                            </span>
                                                            <div class="label rate">Day</div>
                                                        </div>
                                                    </div>
                                                    <div class="rain-wrap">
                                                        <div id="glasscontainer">
                                                            <div id="glass">
                                                                <div id="water"></div>
                                                            </div>
                                                        </div>
                                                        <div class="wrap">
                                                            <span class="device-formatted-data-point fdp">
                                                                <div id="eventrain" data-decimals="2" class="counter" data-target="0">0</div>
                                                            </span>
                                                            <div class="label rate">Event</div>
                                                        </div>
                                                    </div>
                                                </div>
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