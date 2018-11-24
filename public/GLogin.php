<?php
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
		header('Location: ' . filter_var(App::login_url(), FILTER_SANITIZE_URL));
	}
}