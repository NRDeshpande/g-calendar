<?php

class Controller_Rest extends Controller {

	public function action_index() {
        session_start();
        if(!(isset($_SERVER['HTTP_X_GOOG_RESOURCE_ID']) || isset($_SERVER['HTTP_X_GOOG_RESOURCE_STATE']))) {
            App::out("Failed", false, 400);
        }
        
        if($_SERVER['HTTP_X_GOOG_RESOURCE_STATE'] != 'sync') {
            $resource_id = $_SERVER['HTTP_X_GOOG_RESOURCE_ID'];
            $user_event_model = new Model_Events;
            $user_event_model->delete_events_for_resource($resource_id);
        }

        App::out("Ok");
	}
}
