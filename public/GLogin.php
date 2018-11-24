<?php
const PROJECT_URL = 'http://localhost';
// const CLIENT_ID = '677046573764-poa6aponsj09csgfprqn17420n2qipad.apps.googleusercontent.com';
// const CLIENT_SECRET = '_6BGRgWaPUfHiAgLKuSNptEC';
const LOGOUT_URL = 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue='.PROJECT_URL.'/logout';
const LOGIN_URL = PROJECT_URL.'/authentication';
const INDEX_URL = PROJECT_URL;
const DATA_INFO_URL = PROJECT_URL.'/success';

class GLogin {
	private $google_client;
	private $google_auth;
	private $user;
	private $token;

	public function __construct($client) {
		$this->google_client = $client;
		try {
			$this->google_oauth = new Google_Service_Oauth2($this->google_client);
			$this->user = $this->google_oauth->userinfo_v2_me->get();
		} catch (Exception $e) {
			$this->logout();
			GLogin::redir_to_login();
		}		
	}

	public function get_user_info() {
		return $this->user;		
	}

	public function logout() {
		$this->google_client->revokeToken;
		unset($_SESSION['google_oauth_token']);
		unset($_SESSION['access_token']);
		session_destroy();
	}

	public static function redir_to_login() {
		header('Location: ' . filter_var(LOGIN_URL, FILTER_SANITIZE_URL));
	}
}