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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

        <style>
            .tgclass {
                display: none;
            }

        </style>
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
                    <a class="navbar-brand" href="index.html">LIFT KARA DO</a>
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
                        <li>
                            <a href="offer.php">
                                <i class="material-icons">text_fields</i>
                                <span>Offer Ride</span>
                            </a>
                        </li>
                        <li class="active">
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
                                <h2>JOIN TABLE</h2>
                            </div>
                            <div class="body">
                                <form id="wizard_with_validation" method="POST" name="offer_form">
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
                                        <div id="pg_1" class="row">
                                            <!--
                                        <div id="1" class="col-xs-12 buton" onclick="sendID(this.id)">
                                            <div class="info-box-4 hover-expand-effect">
                                                <div class="icon">
                                                    <i class="material-icons col-teal">event_seat</i>
                                                </div>
                                                <div class="content">
                                                    <div class="number">
                                                        <i class="fa fa-mars" aria-hidden="true" style="padding-right:5px;"></i>Shreyas Bhaskarwar</div>
                                                    <div class="text">katraj-swargate-shivajinagar</div>
                                                </div>
                                            </div>
                                        </div>
-->
                                        </div>
                                        <div id="pg_2" class="row clearfix tgclass">
                                            <div class="col-xs-12">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#home_with_icon_title" data-toggle="tab">
                                                            <i class="material-icons">home</i> OWNER INFO
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#profile_with_icon_title" data-toggle="tab">
                                                            <i class="material-icons">face</i> VEHICLE INFO
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                                        <ul class="dashboard-stat-list">
                                                            <li>
                                                                <b>OWNER NAME</b>
                                                                <span class="det_name pull-right"></span>
                                                            </li>
                                                            <li>
                                                                <b>CONTACT NO.</b>
                                                                <span class="det_cont pull-right"></span>
                                                            </li>
                                                            <li>
                                                                <b>RATING</b>
                                                                <span class="det_rat pull-right"> <small>STARS</small></span>
                                                            </li>
                                                            <li>
                                                                <b>DATE</b>
                                                                <span class="det_date pull-right"></span>
                                                            </li>
                                                            <li>
                                                                <b>TIME</b>
                                                                <span class="det_time pull-right"></span>
                                                            </li>
                                                            <li>
                                                                <b>ORIGIN</b>
                                                                <span class="det_org pull-right"></span>
                                                            </li>
                                                            <li>
                                                                <b>DESTINATION</b>
                                                                <span class="det_dest pull-right"></span>
                                                            </li>
                                                            <!--
                                                        <li>
                                                            <b>DELAY TIME</b>
                                                            <span class="det_dt pull-right">15 <small>MINS</small></span>
                                                        </li>
                                                        <li>
                                                            <b>WAITING TIME</b>
                                                            <span class="det_wt pull-right">10 <small>MINS</small></span>
                                                        </li>
-->
                                                            <li>
                                                                <b>MESSAGE BY USER</b>
                                                                <div class="det_mfu">

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="backbtn" type="button">Back</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                                        <ul class="dashboard-stat-list">
                                                            <li>
                                                                <b>VEHICLE NAME</b>
                                                                <span class="det_vname pull-right"></span>
                                                            </li>
                                                            <li>
                                                                <b>AVAILABLE SEATS</b>
                                                                <span class="det_as pull-right"></span>
                                                            </li>
                                                            <li>
                                                                <button class="backbtn" type="button">Back</button>
                                                            </li>
                                                            <li>
                                                                <div id="offid" style="visibility:hidden">

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div id="offererid" style="visibility:hidden">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
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
                                                        <span class="det_org pull-right"></span>
                                                    </li>
                                                    <li>
                                                        <b>DATE</b>
                                                        <span class="det_date pull-right"></span>
                                                    </li>
                                                    <li>
                                                        <b>TIME</b>
                                                        <span class="det_time pull-right"></span>
                                                    </li>
                                                    <li>
                                                        <b>OWNER NAME</b>
                                                        <span class="det_name pull-right"></span>
                                                    </li>
                                                    <li>
                                                        <b>OWNER CONTACT</b>
                                                        <span class="det_cont pull-right"></span>
                                                    </li>
                                                    <li>
                                                        <b>OWNER VEHICLE</b>
                                                        <span class="det_vname pull-right"></span>
                                                    </li>
                                                    <!--
                                                <li>
                                                    <b>DELAY TIME</b>
                                                    <span class="det_dt pull-right">15 <small>MINS</small></span>
                                                </li>
                                                <li>
                                                    <b>WAITING TIME</b>
                                                    <span class="det_wt pull-right">10 <small>MINS</small></span>
                                                </li>
-->
                                                    <li>
                                                        <b>MESSAGE BY USER</b>
                                                        <div class="det_mfu">

                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <form id="form1" name="map_form" method="post" action="">
                                    <input name="org_ip_lat" class="controls" type="hidden">
                                    <input name="org_ip_long" class="controls" type="hidden">
                                    <input name="des_ip_lat" class="controls" type="hidden">
                                    <input name="des_ip_long" class="controls" type="hidden">
                                    <input name="of_date" class="controls" type="hidden">
                                    <input name="of_time" class="controls" type="hidden">
                                    <!--                                <input id="map_btn" type="submit" name="map_submit" value="Submit">-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    TRIP DETAILS
                                </h2>
                            </div>
                            <div class="body">
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
                    //                document.forms["map_form"]["org_ip"].value = this.originPlaceId;
                    //                document.forms["map_form"]["des_ip"].value = this.destinationPlaceId;

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
                                        //document.forms["map_form"]["org_ip_name"].value = results[0].formatted_address;
                                        //console.log(results[0].formatted_address);
                                    }
                                    if (num == 2) {
                                        document.forms["map_form"]["des_ip_lat"].value = results[0].geometry.location.lat();
                                        document.forms["map_form"]["des_ip_long"].value = results[0].geometry.location.lng();
                                        //document.forms["map_form"]["des_ip_name"].value = results[0].formatted_address;
                                        //console.log(results[0].formatted_address);
                                    }   
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
            function sum_disp() {

            }

            function showlist() {
                $('#pg_1').removeClass('tgclass');
                $('#pg_2').addClass('tgclass');
                document.forms["map_form"]["of_date"].value = document.forms["offer_form"]["of_date"].value;
                document.forms["map_form"]["of_time"].value = document.forms["offer_form"]["of_time"].value;

                function shwli() {
//                    console.log(document.forms["map_form"]["of_date"].value);
//                    console.log(document.forms["map_form"]["of_time"].value);
//                    console.log(document.forms["map_form"]["org_ip_lat"].value);
//                    console.log(document.forms["map_form"]["org_ip_long"].value);
                    $.ajax({
                        type: "POST",
                        data: $("#form1").serialize(),
                        async: true,
                        dataType: "html",
                        url: "showlist.php",
                        success: function(data) {
                            if (data == 0) {
                                console.log('No Results Found');
                            } else {
                                $('#pg_1').html(data);
                            }
                        }
                    });
                }
                shwli();
                setInterval(shwli, 5000);
            };
            
            var data
            function sendID(id) {
                data = "offer_id=" + id;
                console.log(data);
                $('#offid').html(id);
                function myfunction() {
                $.ajax({
                    type: "POST",
                    data: data,
                    async: true,
                    dataType: "json",
                    url: "get_offer_details.php",
                    success: function(data1) {
                        $('.det_name').html(data1[7]);
                        $('.det_cont').html(data1[8]);
                        $('.det_rat').html(data1[9]);
                        $('.det_date').html(data1[2]);
                        $('.det_time').html(data1[1]);
                        $('.det_as').html(data1[3]);
                        $('.det_org').html(data1[5]);
                        $('.det_dest').html(data1[6]);
                        $('.det_mfu').html(data1[4]);
                        $('.det_vname').html(data1[10]);
                        $('#offererid').html(data1[0]);
                        //console.log($('#offererid').html());
                    }
                });
            }
                myfunction(data);
                //setInterval(myfunction, 5000);
                $('#pg_1').toggleClass('tgclass');
                $('#pg_2').toggleClass('tgclass');
            };

            function sendoffer() {
                var y = parseFloat($('#offererid').html());
                var x = parseFloat($('#offid').html());
                console.log(x);
                console.log(y);
                var stuff = {
                    'key1': x,
                    'key2': y
                };
                console.log(stuff);
                $.ajax({
                    type: 'POST',
                    url: 'join_entry.php',
                    data: stuff,
                    success: function(response) {}
                });
            }
            
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

        </script>
    </body>

    </html>
