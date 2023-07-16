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
  }