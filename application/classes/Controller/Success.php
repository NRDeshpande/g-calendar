<?php

class Controller_Success extends Controller {

	public function action_app() {
		session_start();
		$email_id = $this->request->param('stuff');
		$success_view = new View('success', ['email_id' => $email_id]);
		$this->response->body($success_view->render());
	}

	public function action_getEvents() {
		session_start();
		$user_events = [];
		$email_id = get_query('email_id');

		$user_event_model = new Model_Events;
		$user_events = $user_event_model->get_user_events($email_id);

		if(empty($user_events)) {
			if(isset($_SESSION['access_token']) && $_SESSION['access_token']) {
				$client = new Google_Client();
				$client->setClientId(App::client_id());
				$client->setClientSecret(App::client_secret());

				$client->setAccessToken($_SESSION['access_token']);

				$params = [
					'orderBy' => 'startTime',
					'singleEvents' => TRUE,
					'timeMin' => date('c'),
				];
			
				$calendar_service = new Google_Service_Calendar($client);
				$results = $calendar_service->events->listEvents('primary', $params);

				if(!empty($results->getItems())) {
					$channel =  new Google_Service_Calendar_Channel($client);


					foreach ($results->getItems() as $event) {
						$start = $event->start->dateTime;
						$end = $event->end->dateTime;
						if(empty($start)) {
							$start = $event->start->date;
						}
						if(empty($end)) {
							$start = $event->end->date;
						}

						$single_event = json_encode([
							'summary' => $event->getSummary(), 
							'start_time' => $start,
							'end_time' => $end
						]);

						$channel->setId($event->id);
						$channel->setType('web_hook');
						$channel->setAddress('https://www.exampel.com/app/notification');

						$user_event_model->save_event($event->id, $email_id, $_SESSION['name'], $single_event);

						$user_events[] =  $single_event;
					}
				}
			} else {
				GLogin::redir_to_login();
			}
		}

		App::out("Success", true, 200, ['events' => $user_events, 'email_id' => $email_id, 'name' => $_SESSION['name']]);
	}
}
