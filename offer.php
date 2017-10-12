<?php
    session_start();
    if(!isset($_SESSION['userid'])){
    header("location: login.php");
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Lift Kara Do</title>
        <!-- Favicon-->
        <link rel="icon" href="" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

        <!-- Bootstrap Select Css -->
        <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- Sweet Alert Css -->
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />

    </head>

    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="index.html">LIFT KARADO</a>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="images/user.png" width="48" height="48" alt="User" />
                    </div>
                    <div class="info-container">
                        <div id="usrname" class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li>
                            <a href="home.php">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="offer.php">
                                <i class="material-icons">text_fields</i>
                                <span>Offer Ride</span>
                            </a>
                        </li>
                        <li>
                            <a href="join.php">
                                <i class="material-icons">layers</i>
                                <span>Join Ride</span>
                            </a>
                        </li>
                        <li>
                            <a href="myprofile.php">
                                <i class="material-icons">widgets</i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons">swap_calls</i>
                                <span>Support</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">Website &copy; 2017 <a href="javascript:void(0);">LiftKaraDo</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.5
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL CREDITS</div>
                                <div id="cred" class="number"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">help</i>
                            </div>
                            <div class="content">
                                <div class="text">MY RATING</div>
                                <div id="rate" class="number"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">forum</i>
                            </div>
                            <div class="content">
                                <div class="text">CO2 EMMISSION SAVED</div>
                                <div id="coemit" class="number">2 kg</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-orange hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">person_add</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL CUSTOMERS</div>
                                <div id="cust" class="number">2</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
                <!-- Basic Example | Horizontal Layout -->
                <div class="row clearfix">
                    <div class="col-sm-6 col-xs-12">
                        <div class="card" style="margin-bottom: 0px;">
                            <div class="header">
                                <h2>OFFER FORM</h2>
                            </div>
                            <div class="body">
                                <form id="wizard_with_validation" name="offer_form" method="POST">
                                    <h3>First</h3>
                                    <fieldset>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="origin-input" type="text" placeholder="" name="org_name" class="form-control" required>
                                                <label class="form-label">Origin</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="destination-input" placeholder="" type="text" name="des_name" class="form-control" required>
                                                <label class="form-label">Destination</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12" style="padding-left: 0px">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="datepicker form-control" name="of_date" placeholder="Date of Trip">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12" style="padding-right: 0px;">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="timepicker form-control" name="of_time" placeholder="Time of Trip">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h3>Second</h3>
                                    <fieldset>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="of_as" min="1" max="4" required>
                                                <label class="form-label">Seats Available</label>
                                            </div>
                                        </div>
                                        <!--
                                    <div class="col-sm-6 col-xs-12" style="padding-left: 0px">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control show-tick">
                                                    <option value="">-- Please select delay time --</option>
                                                    <option value="10">5 min</option>
                                                    <option value="20">10 min</option>
                                                    <option value="30">15 min</option>
                                                    <option value="40">30 min</option>
                                                    <option value="50">45 min</option>
                                                    <option value="50">60 min</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12" style="padding-left: 0px">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control show-tick">
                                                    <option value="">-- Please select waiting time --</option>
                                                    <option value="10">5 min</option>
                                                    <option value="20">10 min</option>
                                                    <option value="30">15 min</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
-->
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="of_mfu" class="form-control">
                                                <label class="form-label">Message for user</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h3>Summary</h3>
                                    <fieldset>
                                        <div class="col-xs-12">
                                            <div class="body">
                                                <ul class="dashboard-stat-list">
                                                    <li>
                                                        <b>ORIGIN</b>
                                                        <div id="sum_org">

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <b>DESTINATION</b>
                                                        <div id="sum_dest">

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <b>DATE</b>
                                                        <span id="sum_date" class="pull-right"></span>
                                                    </li>
                                                    <li>
                                                        <b>TIME</b>
                                                        <span id="sum_time" class="pull-right"></span>
                                                    </li>
                                                    <li>
                                                        <b>AVAILABLE SEATS</b>
                                                        <span id="sum_as" class="pull-right"></span>
                                                    </li>
                                                    <!--
                                                <li>
                                                    <b>DELAY TIME</b>
                                                    <span id="sum_dt" class="pull-right">15 <small>MINS</small></span>
                                                </li>
                                                <li>
                                                    <b>WAITING TIME</b>
                                                    <span id="sum_wt" class="pull-right">10 <small>MINS</small></span>
                                                </li>
-->
                                                    <li>
                                                        <b>MESSAGE FOR USER</b>
                                                        <div id="sum_mfu">

                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <!-- #END# Answered Tickets -->
                                    </fieldset>
                                </form>
                                <form id="form1" name="map_form" method="post" action="">
                                    <input name="org_ip" class="controls" type="hidden">
                                    <input name="org_ip_lat" class="controls" type="hidden">
                                    <input name="org_ip_long" class="controls" type="hidden">
                                    <input name="org_ip_name" class="controls" type="hidden">
                                    <input name="des_ip" class="controls" type="hidden">
                                    <input name="des_ip_lat" class="controls" type="hidden">
                                    <input name="des_ip_long" class="controls" type="hidden">
                                    <input name="des_ip_name" class="controls" type="hidden">
                                    <input name="of_date" class="controls" type="hidden">
                                    <input name="of_time" class="controls" type="hidden">
                                    <input name="of_seats" class="controls" type="hidden">
                                    <input name="of_mfu" class="controls" type="hidden">
                                    <input name="of_dist" class="controls" type="hidden">
                                    <input name="of_dur" class="controls" type="hidden">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    JOURNEY DETAILS
                                </h2>
                            </div>
                            <div class="body">
                                <div id="panell" class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0.0);position: absolute;z-index: 1;right: 20px;padding: 10px;display:none;opacity:0.9;">
                                    Distance : <span id="panel1"></span><br> Duration : <span id="panel2"></span>
                                </div>
                                <div id="map" class="gmap"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Example | Horizontal Layout -->
            </div>
        </section>
        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 18.5204,
                        lng: 73.8567
                    },
                    zoom: 13,
                    zoomControl: true,
                    mapTypeControl: false,
                    scaleControl: true,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false
                });

                new AutocompleteDirectionsHandler(map);
            }

            function AutocompleteDirectionsHandler(map) {
                this.map = map;
                this.originPlaceId = null;
                this.destinationPlaceId = null;
                this.travelMode = 'DRIVING';
                var originInput = document.getElementById('origin-input');
                var destinationInput = document.getElementById('destination-input');
                this.directionsService = new google.maps.DirectionsService;
                this.directionsDisplay = new google.maps.DirectionsRenderer;
                this.directionsDisplay.setMap(map);

                var originAutocomplete = new google.maps.places.Autocomplete(originInput, {
                    placeIdOnly: true
                });
                var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, {
                    placeIdOnly: true
                });

                this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
                this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

                //Remove after integration
                //            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
                //            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);

            }

            AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
                var me = this;
                autocomplete.bindTo('bounds', this.map);
                autocomplete.addListener('place_changed', function() {
                    var place = autocomplete.getPlace();
                    if (!place.place_id) {
                        window.alert("Please select an option from the dropdown list.");
                        return;
                    }
                    if (mode === 'ORIG') {
                        me.originPlaceId = place.place_id;
                    } else {
                        me.destinationPlaceId = place.place_id;
                    }
                    me.route();
                });
            };

            AutocompleteDirectionsHandler.prototype.route = function() {
                if (!this.originPlaceId || !this.destinationPlaceId) {
                    return;
                }
                var me = this;
                var flag = 0;
                this.directionsService.route({
                    origin: {
                        'placeId': this.originPlaceId
                    },
                    destination: {
                        'placeId': this.destinationPlaceId
                    },
                    travelMode: this.travelMode
                }, function(response, status) {
                    if (status === 'OK') {
                        me.directionsDisplay.setDirections(response);
                        flag = 1;
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
                if (flag = 1) {
                    document.forms["map_form"]["org_ip"].value = this.originPlaceId;
                    document.forms["map_form"]["des_ip"].value = this.destinationPlaceId;

                    var geocoder = new google.maps.Geocoder;

                    geocodePlaceId(geocoder, this.originPlaceId, 1);
                    geocodePlaceId(geocoder, this.destinationPlaceId, 2);

                    function geocodePlaceId(geocoder, placeId, num) {
                        geocoder.geocode({
                            'placeId': placeId
                        }, function(results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    if (num == 1) {
                                        document.forms["map_form"]["org_ip_lat"].value = results[0].geometry.location.lat();
                                        document.forms["map_form"]["org_ip_long"].value = results[0].geometry.location.lng();
                                        document.forms["map_form"]["org_ip_name"].value = results[0].formatted_address;
                                        //console.log(results[0].formatted_address);
                                    }
                                    if (num == 2) {
                                        document.forms["map_form"]["des_ip_lat"].value = results[0].geometry.location.lat();
                                        document.forms["map_form"]["des_ip_long"].value = results[0].geometry.location.lng();
                                        document.forms["map_form"]["des_ip_name"].value = results[0].formatted_address;
                                        //console.log(results[0].formatted_address);
                                    }
                                    var olat = parseFloat(document.forms["map_form"]["org_ip_lat"].value);
                                    var olong = parseFloat(document.forms["map_form"]["org_ip_long"].value);
                                    var origin1 = {
                                        lat: olat,
                                        lng: olong
                                    };
                                    //console.log(origin1);

                                    var dlat = parseFloat(document.forms["map_form"]["des_ip_lat"].value);
                                    var dlong = parseFloat(document.forms["map_form"]["des_ip_long"].value);
                                    var destinationB = {
                                        lat: dlat,
                                        lng: dlong
                                    };
                                    //console.log(destinationB);

                                    var service = new google.maps.DistanceMatrixService;
                                    service.getDistanceMatrix({
                                        origins: [origin1],
                                        destinations: [destinationB],
                                        travelMode: 'DRIVING',
                                        unitSystem: google.maps.UnitSystem.METRIC,
                                        avoidHighways: false,
                                        avoidTolls: true
                                    }, function(response, status) {
                                        if (status !== 'OK') {
                                            alert('Error was: ' + status);
                                        } else {
                                            var originList = response.originAddresses;
                                            var destinationList = response.destinationAddresses;
                                            var results = response.rows[0].elements;
                                            document.forms["map_form"]["of_dist"].value = results[0].distance.text;
                                            document.forms["map_form"]["of_dur"].value = results[0].duration.text;
                                            document.getElementById("panell").style.display = "block";
                                            document.getElementById('panel1').innerHTML = results[0].distance.text;
                                            document.getElementById('panel2').innerHTML = results[0].duration.text;

                                        }
                                    });
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });
                    }



                }
            };

        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAC3UoJ14H6YjehFf516Urhbu7TRbRGNTM&libraries=places&callback=initMap" async defer></script>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Jquery Validation Plugin Css -->
        <script src="plugins/jquery-validation/jquery.validate.js"></script>

        <!-- JQuery Steps Plugin Js -->
        <script src="plugins/jquery-steps/jquery.steps.js"></script>

        <!-- Sweet Alert Plugin Js -->
        <script src="plugins/sweetalert/sweetalert.min.js"></script>

        <!-- Autosize Plugin Js -->
        <script src="plugins/autosize/autosize.js"></script>

        <!-- Moment Plugin Js -->
        <script src="plugins/momentjs/moment.js"></script>

        <!-- Bootstrap Material Datetime Picker Plugin Js -->
        <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <script src="js/pages/forms/form-wizard.js"></script>
        <script src="js/pages/forms/basic-form-elements.js"></script>
        <script src="js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>
        <script>
            
            setInterval(function getCash() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var obj = JSON.parse(this.responseText); 
                            document.getElementById('cred').innerHTML = obj.user_credit;
                            document.getElementById('rate').innerHTML = obj.user_rate;
                            document.getElementById('usrname').innerHTML = obj.user_name;
                    }
                };
                xhttp.open("GET", "credits.php", true);
                xhttp.send();
            }, 1000);
            
            function sum_disp() {
                document.getElementById('sum_org').innerHTML = document.forms["offer_form"]["org_name"].value;
                document.getElementById('sum_dest').innerHTML = document.forms["offer_form"]["des_name"].value;
                document.getElementById('sum_date').innerHTML = document.forms["offer_form"]["of_date"].value;
                document.getElementById('sum_time').innerHTML = document.forms["offer_form"]["of_time"].value;
                document.getElementById('sum_as').innerHTML = document.forms["offer_form"]["of_as"].value;
                document.getElementById('sum_mfu').innerHTML = document.forms["offer_form"]["of_mfu"].value;

                document.forms["map_form"]["of_date"].value = document.forms["offer_form"]["of_date"].value;
                document.forms["map_form"]["of_time"].value = document.forms["offer_form"]["of_time"].value;
                document.forms["map_form"]["of_seats"].value = document.forms["offer_form"]["of_as"].value;
                document.forms["map_form"]["of_mfu"].value = document.forms["offer_form"]["of_mfu"].value;
            }

            function showlist() {
                console.log('Function not in use');
            };

            function sendoffer() {
                $.ajax({
                    type: "POST",
                    data: $("#form1").serialize(),
                    async: true,
                    dataType: "html",
                    url: "offer_bid.php",
                    success: function(data) {
                        console.log(data);
                    }
                });
            };

        </script>
    </body>

    </html>
