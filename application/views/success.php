<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    
    <link rel="stylesheet" href="<?php echo App::url();?>/css/style.css">
</head>
<body ng-cloak layout="column" ng-controller="events">
    <!-- Angular.js Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-route.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/svg-assets-cache.js"></script> 

    <!-- Angular Material Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.js"></script>
    
    <!--library files -->
    <script src="<?php echo App::url();?>/js/app.js"></script>

    <md-toolbar class="md-whiteframe-1dp" layout="row">
        <md-button class="tolowercase">
            <img class="logo" src="<?php echo App::url();?>/css/bug.png" >
        </md-button>

        <div flex></div>
        <md-button class="tolowercase" ng-click="logout()">
            <md-icon class="material-icons">settings_power</md-icon>
            Logout
        </md-button>
    </md-toolbar>

    <md-content md-scroll-y class="md-padding"  ng-init="get_events('<?php echo $email_id; ?>')">
        <div layout="row" layout-xs="column" layout-align="center center" flex="100" layout-wrap>
            <md-card flex="30" md-theme="default" md-theme-watch ng-repeat="event in event_ctrl.data.events">
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline">{{ event | jsdecode_string:'summary' }}</span>
   
                    </md-card-title-text>
                </md-card-title>
                <md-card-content>
                    <p layout="column">
                        <span class="md-subhead"><span class="md-text"> Email: </span> {{ event_ctrl.data.email_id }}</span>
                        <span class="md-subhead"><span class="md-text"> Name: </span> {{ event_ctrl.data.name }}</span>
                        <span class="md-subhead"><span class="md-text"> On: </span> {{ event | jsdecode_string:'start_time' | date_display }} - {{ event | jsdecode_string:'end_time' | date_display }}</span>
                    </p>
                    </md-card-content>
            </md-card>
        </div>
    </md-content>

    <script>
        var global = {
            'app_url': '<?php echo App::url() ?>',
            'logout_url': '<?php echo App::logout_url(); ?>'
        };
    </script>
</body>
</html>