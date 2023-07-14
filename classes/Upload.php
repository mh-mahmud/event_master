<?php


class Upload {

    private $_db;

    public function __construct($user = null){
        $this->_db = DB::getInstance();
    }

    public function uploadJsonData($data) {
        return $this->_db->insert('events', $data);
    }

} 