<?php
  
  class M_CultivationQuestionsResponse {
    private $db;
    

    public function __construct(){
      $this->db = new Database;
    }

    public function add($data){
      $this->db->query("INSERT INTO cultivation_question_response (question_id,agri_officer_id, content) VALUES (:question_id, :agri_officer_id, :content)");
      $this->db->bind(':question_id',$data['question_id']);
      $this->db->bind(':content', $data['content']);
      $this->db->bind(':agri_officer_id', $_SESSION['user_id']);

      if($this->db->execute()){
        return true;
      }
      else {
        return false;
      }
    }

      public function getCultivationQuestionResponse($id){
      $this->db->query("select
        a.id as 'response_id',
        a.question_id as 'question_id',
        a.agri_officer_id as 'agri_officer_id',
        a.responded_date_time as 'responded_date_time',
        a.content as 'content',
        ru.name as 'agri_officer_name',
        b.producer_id as 'producer_id',
        b.title as 'quesion_title',
        b.content as 'quesion_content',
        b.asked_date_time as 'asked_date_time',
        pr.name as 'producer_name' 
        FROM cultivation_question_response a
        INNER JOIN cultivation_question b 
        ON a.question_id=b.id
        INNER JOIN registered_user ru
        ON a.agri_officer_id=ru.id
        INNER JOIN producer pr
        ON b.producer_id=pr.id
        WHERE a.question_id = :id
        ORDER BY a.responded_date_time");
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    //to get data for the view of 0 response
    public function getCultivationQuestionsFor0Response($id){
      $this->db->query("select
      a.id AS 'cultivation_question_id',
      a.producer_id AS 'producer_id',
      a.title AS 'title',
      a.content AS 'content',
      a.image AS 'image',
      a.asked_date_time AS 'asked_date_time',
      ru.name as 'name'
      FROM cultivation_question a
      INNER JOIN registered_user ru ON a.id=p.id
      WHERE a.id=:id");
      $row = $this->db->single();
      return $row;
    }

     //to retrieve data to the question response edit form
     public function getCultivationQuestionResponseID($id){
      $this->db->query("SELECT * FROM cultivation_question_response WHERE id = :id");
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      return $row;
    }

    public function editCultivationQuestionResponse($data){
      $this->db->query("UPDATE cultivation_question_response SET content = :content WHERE id = :id");
      $this->db->bind(':id', $data['questions_response_id']);
      $this->db->bind(':content', $data['content']);
      
      if($this->db->execute()){
        return true;
      }
      else {
        return false;
      }
    }

    public function deleteCultivationQuestionResponse($id){
      $this->db->query("DELETE FROM cultivation_question_response WHERE id = :id");
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      }
      else {
        return false;
      }
    }

  }