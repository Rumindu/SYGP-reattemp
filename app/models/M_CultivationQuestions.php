<?php
  
  class M_CultivationQuestions {
    private $db;
    

    public function __construct(){
      $this->db = new Database;
    }

    public function getCultivationQuestions(){
      $this->db->query("select
      a.id AS 'cultivation_question_id',
      a.producer_name AS 'producer_name',
      a.title AS 'title',
      a.content AS 'content',
      a.image AS 'image',
      a.asked_date_time AS 'asked_date_time'
      FROM cultivation_question a
      ORDER BY a.asked_date_time DESC");
      $results = $this->db->resultSet();
      return $results;
    }

      public function getCultivationQuestionResponse($id){
      $this->db->query("select
        a.id as 'response_id',
        a.question_id as 'question_id',
        a.agri_officer_id as 'agri_officer_id',
        a.responded_date_time as 'responded_date_time',
        a.content as 'content',
        r.name as 'agri_officer_name',
        b.producer_name as 'producer_name',
        b.title as 'quesion_title',
        b.content as 'quesion_content',
        b.asked_date_time as 'asked_date_time'
        FROM cultivation_question_response a
        INNER JOIN cultivation_question b 
        ON a.question_id=b.id
        INNER JOIN registered_user r
        ON a.agri_officer_id=r.id
        WHERE a.question_id = :id
        ORDER BY a.responded_date_time");
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCultivationQuestions0Response($id){
      $this->db->query("select
      a.id AS 'cultivation_question_id',
      a.producer_name AS 'producer_name',
      a.title AS 'title',
      a.content AS 'content',
      a.image AS 'image',
      a.asked_date_time AS 'asked_date_time'
      FROM cultivation_question a
      WHERE a.id=:id");
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getCultivationQuestionCategoryList(){
      $this->db->query("SELECT category FROM cultivation_question_category");
      $results = $this->db->resultSet();
      return $results;
    }

    public function add($data){
      $this->db->query('INSERT INTO cultivation_question (producer_name, title, content, category) VALUES(:producer_name, :title, :content, :category)');
      print_r($data);
      echo("<br>");
      echo ($data['title']);
      echo("<br>");
      echo ($data['scategory']);
      // Bind values
      $this->db->bind(':producer_name', $_SESSION['user_name']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':content', $data['content']);
      $this->db->bind(':category', $data['scategory']);
      
      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    

  }