<?php

class Controller_Rest extends Controller {

	public function action_index() {
        $user_event_model = new Model_Events;
        $user_event_model->webhook_response();
	}
}
