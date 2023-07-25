<?php
  date_default_timezone_set('Asia/Kolkata');
  
  class M_Announcements {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getAnnouncements(){
      $this->db->query("select
      a.id AS 'announcement_id',
      a.agri_officer_id AS 'agri_officer_id',
      a.title AS 'title',
      a.content AS 'content',
      a.published_date_time as 'published_date_time',
      ag.name as 'name'
      FROM announcement a
      INNER JOIN agri_officer ag ON a.agri_officer_id=ag.id");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getPostId($id){
      $this->db->query("SELECT * FROM announcement WHERE id = :id");
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      return $row;
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

    public function editAnnouncement($data){
      $this->db->query("UPDATE announcement SET title = :title, content = :content, published_date_time = :published_date_time WHERE id = :id");
      $this->db->bind(':id', $data['announcement_id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':content', $data['content']);
      $this->db->bind(':published_date_time', date('Y-m-d H:i:s'));

      if($this->db->execute()){
        return true;
      }
      else {
        return false;
      }
    }
  }