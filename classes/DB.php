<?php

class DB {
    private static $_instance = null;
    private     $_pdo,
                $_query,
                $_error = false,
                $_results,
                $_count = 0;

    public function __construct(){
        try{
            // PDO(String, username, password)
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username') , Config::get('mysql/password'));
            //$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // Following a singleton pattern
    public static function getInstance(){

        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }

        return self::$_instance;
    }

    public function get($table, $w) {
        $sql ="";
        $sql .= " SELECT * FROM events ";
        
        if(!empty($w['employee_name']) && !empty($w['event_name']) && !empty($w['event_date'])) {
            $sql .= " WHERE employee_name=:employee_name AND  event_name=:event_name AND event_date=:event_date";
        }
        else if(!empty($w['event_name']) && !empty($w['event_date'])) {
            $sql .= " WHERE event_name=:event_name AND event_date=:event_date";
        }
        else if(!empty($w['employee_name']) && !empty($w['event_date'])) {
            $sql .= " WHERE employee_name=:employee_name AND event_date=:event_date";
        }
        else if(!empty($w['employee_name']) && !empty($w['event_name'])) {
            $sql .= " WHERE employee_name=:employee_name AND event_name=:event_name";
        }
        else if(!empty($w['event_date'])) {
            $sql .= " WHERE event_date=:event_date";
        }
        else if(!empty($w['event_name'])) {
            $sql .= " WHERE event_name=:event_name";
        }
        else if(!empty($w['employee_name'])) {
            $sql .= " WHERE employee_name=:employee_name";
        }

        $query = $this->_pdo->prepare($sql);
        $query->execute($w);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $fields){

        try {
            $sql = "INSERT INTO 
                    events (participation_id, employee_name,employee_mail,event_id,event_name,participation_fee,event_date,version)
                    VALUES (:participation_id, :employee_name, :employee_mail, :event_id, :event_name, :participation_fee, :event_date, :version)";  
            // Create a statement
            $st = $this->_pdo->prepare($sql);
            $fee_data = [];
            foreach ($fields as $field) {
                if(!is_object($field)) {
                    return "Invalid data format";
                }

                // bind values and execute statement in a loop:
                $st->bindValue( ":participation_id", $field->participation_id);
                $st->bindValue( ":employee_name", $field->employee_name);
                $st->bindValue( ":employee_mail", $field->employee_mail);
                $st->bindValue( ":event_id", $field->event_id);
                $st->bindValue( ":event_name", $field->event_name);
                $st->bindValue( ":participation_fee", $field->participation_fee);
                $st->bindValue( ":event_date", $field->event_date);
                $field->version = isset($field->version) ? $field->version : null;
                $st->bindValue( ":version", $field->version);


                // $st->bindValue( ":Description", $desc, PDO::PARAM_STR );
                $st->execute();
                $last_id = $this->_pdo->lastInsertId();
            }
            return true;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

} 