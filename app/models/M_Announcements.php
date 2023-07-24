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

    public function addAnnouncement($data){
      $this->db->query("INSERT INTO announcement (title, content,	agri_officer_id) VALUES (:title, :content, :agri_officer_id)");
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':content', $data['content']);
      $this->db->bind(':agri_officer_id', $_SESSION['user_id']);

      if($this->db->execute()){
        return true;
      }
      else {
        return false;
      }
    }
  }