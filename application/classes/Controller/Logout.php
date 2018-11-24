<?php

class Controller_Logout extends Controller {

	public function action_index() {
		$client = new Google_Client();
        $client->setClientId(App::client_id());
        $client->setClientSecret(App::client_secret());
        $client->addScope(Google_Service_People::USERINFO_PROFILE);
        $client->addScope(Google_Service_People::USERINFO_EMAIL);
        if(isset($_SESSION['access_token']) && $_SESSION['access_token']) {		
            $client->setAccessToken($_SESSION['access_token']);
            $local_signin = new GLogin($client);
            $local_signin->logout(); 
            header('Location: ' . filter_var(App::url(), FILTER_SANITIZE_URL));
        } else {
            GLogin::redir_to_login();
        }
	}
}
