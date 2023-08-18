<?php
  class M_Users {

    private $db;
    public function __construct() {
      $this->db = new Database;
    }

    public function getDistricts(){
      $this->db->query('SELECT * FROM district');
      $results = $this->db->resultSet();
      return $results;
    }
    
    public function register($data){
      $this->db->query('INSERT INTO registered_user (nic, role, name, address, district, email, contact_no, hash_password) VALUES(:nic,:role,:name,:address, :district, :email, :contact_no, :hash_password)');
      // Bind values
      $this->db->bind(':nic', $data['nic']);
      $this->db->bind(':role', $data['user_role']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':district', $data['sdistrict']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':contact_no', $data['phone']);
      $this->db->bind(':hash_password', $data['password']);

      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email) {
      $this->db->query
      //we are using prepared statements here (:email)
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
    
    // Login User  
    public function login($email, $password) {
      $this->db->query('SELECT * FROM agri_officer WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if (password_verify($password, $hashed_password)) {
        return $row;
      } else {
        return false;
      }
    }
  }