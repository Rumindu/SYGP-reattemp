<?php
  class M_Announcements {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getAnnouncements(){
      $this->db->query("SELECT * FROM announcement");
      $results = $this->db->resultSet();
      return $results;
    }
  }