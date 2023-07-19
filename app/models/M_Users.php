<?php
  class M_Users {

    private $db;
    public function __construct() {
      $this->db = new Database;
    }

    public function register($data){
  
      $this->db->query('INSERT INTO agri_officer (name, email, password) VALUES(:name, :email, :password)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
      
    }
    public function findUserByEmail($email) {
      $this->db->query
      // ":" represent this is a bind value
      ('SELECT * FROM agri_officer WHERE email = :email');

      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if ($this->db->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }
  }