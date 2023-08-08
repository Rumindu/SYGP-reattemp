<?php
  /*
  #PDO Database class
  #creates prepared statements
  #bind values
  #returns rows and results
  */
  class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    //database handler (use to handle prepared statements)
    private $dbh;
    
    private $stmt;
    private $error;

    public function __construct(){
      //set DSN (Data Source Name contains the information required to establish a connection to a database)
      $dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true, //persistent connection
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //error mode
      );

      //create PDO instance
      try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      }catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    //prepare statement with query
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }   

    //bind values
    public function bind($param, $value, $type = null){
      //check if $type is null
      if(is_null($type)){
        //check the type of $value
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default: 
            $type = PDO::PARAM_STR;
        }
      }
      $this->stmt->bindValue($param, $value, $type);
    }

    //execute the prepared statement
    public function execute(){
      return $this->stmt->execute();
    }

    //get result set as array of objects
    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //get single record as object
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    } 
  }