var app = angular.module('app', ['ngMaterial']);


app.filter('jsdecode_string', function () {
	return function (json_string, type) {
		var json_obj = angular.fromJson(json_string);
		return json_obj[type];
	}
});

app.filter('date_display', function() {
	return function (dt) {
		if (typeof (dt) === 'undefined' || dt == '' || dt == null)
			return '';

        var _date = new Date(dt);
		return ('0' + (_date.getMonth()+1)).slice(-2) + '/' + ('0' + _date.getDate()).slice(-2) + '/' + _date.getFullYear() + ' ' + _date.getHours() + ':' + _date.getMinutes();
	};
});

app.controller('events', function($scope, $http, $mdToast) {

    $scope.reset_event_ctrl_scope = function() {
        $scope.event_ctrl = {
            'data': [],
            'loading': true
        };
    };

    $scope.get_events = function(email_id) {
        $scope.reset_event_ctrl_scope();

        $http.get(global.app_url+'/success/getEvents/?email_id='+email_id).then(function(resposne){
            if(resposne.data.status == "success") {
                $scope.event_ctrl.data = resposne.data.data;
                $scope.event_ctrl.loading = false;
            }
        },function(rejection) {
            $mdToast.show($mdToast.simple().textContent(rejection.data.message));
        });
    };

    $scope.logout = function() {
       window.location = global.logout_url;
    };
});