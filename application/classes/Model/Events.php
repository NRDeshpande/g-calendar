<?php
class Model_Events extends Model_Database
{
    private $_user_event_table = 'users';
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

    public function get_user_events($email_id) {
        $query = DB::select()->from($this->_user_event_table)->where('email_id', '=', $email_id);
        $this->_results = $query->execute();

        return $this->process_db_events();
    }

    public function save_event($event_id, $email_id, $name, $user_events) {
        $query = DB::insert($this->_user_event_table, ['event_id', 'email_id', 'full_name', 'event'])
        ->values([$event_id, $email_id, $name, $user_events]);

        $this->_results = $query->execute();
    }
}