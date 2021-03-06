<?php
class Model_Events extends Model_Database
{
    private $_user_event_table = 'users_events';
    private $_results = [];
  
    public function __construct() {
        $default = Database::instance();
    }

    private function process_db_events() {
        $events = [];
        if(!empty($this->_results)) {
            foreach($this->_results as $result) {
                $events[] = $result['event'];
            }
        }

        return $events;
    }

    /**
     * Function to get the events based on the email id
     */
    public function get_user_events($email_id) {
        $query = DB::select()->from($this->_user_event_table)->where('email_id', '=', $email_id);
        $this->_results = $query->execute();

        return $this->process_db_events();
    }

    /**
     * Function to save the events with user data and resource_id given by Google
     */
    public function save_event($resource_id, $email_id, $name, $user_events) {
        $query = DB::insert($this->_user_event_table, ['resource_id', 'email_id', 'full_name', 'event'])
        ->values([$resource_id, $email_id, $name, $user_events]);

        $this->_results = $query->execute();
    }

    /**
     * Function to delete the events based on the Google's resource_id
     */
    public function delete_events_for_resource($resource_id) {
        $query = DB::delete($this->_user_event_table)->where('resource_id', '=', $resource_id);
        $this->_results = $query->execute();
    }
}