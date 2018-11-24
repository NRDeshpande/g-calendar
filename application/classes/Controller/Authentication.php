<?php

class Controller_Authentication extends Controller {

	public function action_index() {
		session_start();
		$client = new Google_Client();
		$client->setClientId(App::client_id());
		$client->setClientSecret(App::client_secret());
		$client->setRedirectUri(LOGIN_URL);
		$client->addScope(Google_Service_People::USERINFO_PROFILE);
		$client->addScope(Google_Service_People::USERINFO_EMAIL);
		$client->addScope(Google_Service_Calendar::CALENDAR);
		$client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
		if (!isset($_GET['code'])) {
			$auth_url = $client->createAuthUrl();
			header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
		} else {
			$client->authenticate($_GET['code']);
			$_SESSION['access_token'] = $client->getAccessToken();
			$local_signin = new GLogin($client);
			$_SESSION['email_id'] = $local_signin->get_user_info()->email;
			$_SESSION['name'] = $local_signin->get_user_info()->name;
			header('Location: ' . filter_var(DATA_INFO_URL, FILTER_SANITIZE_URL).'/app/'.$local_signin->get_user_info()->email);
		}
	}
}
