<?php
session_start();
unset($_SESSION['google_oauth_token']);
unset($_SESSION['access_token']);
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 

    <title>Google Calender - Login</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo App::url();?>/css/bug.png"/>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    
    <link rel="stylesheet" href="<?php echo App::url();?>/css/style.css">
</head>

<span id="forkongithub" hide-xs>
    <a href="https://github.com/NRDeshpande/g-calendar">Fork me on GitHub</a>
</span>

<body ng-cloak layout="column">
    <!-- Angular.js Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-route.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/svg-assets-cache.js"></script> 

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- Angular Material Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.js"></script>
    
    <!--library files -->
    <script src="<?php echo App::url();?>/js/app.js"></script>

    <md-content md-scroll-y class="md-padding">
		<div layout="column" layout-align="center center">
            <h2>Welcome to Google Calender App</h2>
            <md-button class="tolowercase" class="md-whiteframe-1dp" href="<?php echo App::login_url();?>">
                <img width="180px" alt="Google &quot;G&quot; Logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png"/>
                Login with Google
            </md-button>

            <div class="mt10" layout="row" layout-wrap>
                <a href="https://twitter.com/NRDeshapnde?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @NRDeshapnde</a>
                <span class="p10"></span>
                <a class="github-button" href="https://github.com/NRDeshpande" aria-label="Follow @NRDeshpande on GitHub">Follow @NRDeshpande</a>
            </div>
		</div>
    </md-content>

</body>
</html>