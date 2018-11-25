<?php

/**
 * Login Controller, to render the login view
 */

class Controller_Login extends Controller {

	public function action_index() {
		$login_view = new View('login');
		$this->response->body($login_view->render());
	}
}
