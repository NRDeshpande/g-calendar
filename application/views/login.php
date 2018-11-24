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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    
    <link rel="stylesheet" href="<?php echo App::url();?>/css/style.css">
</head>
<body ng-cloak layout="column">
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

    <md-content md-scroll-y class="md-padding">
		<div layout="column" layout-align="center center">
            <h2>Welcome to Google Calender App</h2>

			<?php
			if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
				?>
				User already logged in
				<md-button class="tolowercase">
					<a href="<?php echo App::logout_url();?>" class="btn btn-large btn-primary">Logout</a>
				</md-button>
				<?php
			} else {
				?>
				<md-button class="tolowercase" class="md-whiteframe-1dp" href="<?php echo App::login_url();?>">
					<img width="180px" alt="Google &quot;G&quot; Logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png"/>
					Login with Google
				</md-button>
				<?php
			}
			?>
		</div>
    </md-content>

</body>
</html>