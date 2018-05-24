<?php

namespace db;

class DbAdmin {

    protected $myDb = null;
    
    function __construct($dbName, $dbUser, $dbPass)
    {
        
        if(!$this->myDb) {
            try{
                
                $this->myDb = new \PDO('mysql:host=localhost;dbname='. $dbName, $dbUser, $dbPass);
                $this->myDb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch(\PDOException $e) {
                
                throw new \Exception($e->getMessage());
            }
        }
    }
}