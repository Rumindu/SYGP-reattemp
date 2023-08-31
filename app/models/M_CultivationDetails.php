<?php
  class M_CultivationDetails {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getCultivationDetails(){
      $this->db->query("select * From registered_user where role = 'Producer'");
      $results = $this->db->resultSet();
      return $results;
    }
  }