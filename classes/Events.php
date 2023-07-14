<?php


class Events {

    private $_db,
            $_data;

    public function __construct($user = null){
        $this->_db = DB::getInstance();
    }

    public function get_events($where=[]) {
        if(!empty($where)) {
            array_pop($where);
            $where = array_filter($where);
            $where = array_map('trim', $where);
        }
        return $this->_db->get("events", $where);
    }

} 