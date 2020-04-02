<?php

class myPDO {
    //mysql://bf604cc1ac550d:ac139274@us-cdbr-iron-east-01.cleardb.net/heroku_298c88876531867?reconnect=true
    private $HOST="us-cdbr-iron-east-01.cleardb.net";
    private $USER ="bf604cc1ac550d";
    private $PASS="ac139274";
    private $DB= "heroku_298c88876531867";
    protected $conn;
    protected $stmt;
    private $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL,PDO::ATTR_PERSISTENT=>true,PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
   
    public function __construct()
    {
      try {
        $this->conn = new PDO("mysql:host=".$this->HOST.";dbname=".$this->DB,$this->USER,$this->PASS,$this->options);
        } catch (PDOException $ex) {
            die('Connection: '.$ex->getMessage());
        }
    }

    public function execute($sql = null,$param = array())
    {
        try {
             $this->conn->beginTransaction();
             $this->stmt = $this->conn->prepare($sql);
             
             if (empty($param)|| count($param)==0) {
                 $this->stmt->execute();
             }else{
                 $this->stmt->execute($param);
             }

             $this->conn->commit();
             $this->conn = null;
             return $this->stmt;
        } catch (PDOException $ex) {
            $this->conn->rollBack();
            die('execute: '.$ex->getMessage());
        }
    }
}
 
?>