<?php
  
  class M_CultivationQuestions {
    private $db;
    

    public function __construct(){
      $this->db = new Database;
    }

    public function getCultivationQuestions(){
      $this->db->query("select
      a.id AS 'cultivation_question_id',
      a.producer_id AS 'producer_id',
      a.title AS 'title',
      a.content AS 'content',
      a.image AS 'image',
      a.asked_date_time AS 'asked_date_time',
      p.name as 'name'
      FROM cultivation_question a
      INNER JOIN producer p ON a.id=p.id
      ORDER BY a.asked_date_time DESC");
      $results = $this->db->resultSet();
      return $results;
    }

    //   public function getCultivationQuestionResponse($id){
    //   $this->db->query("select
    //     a.id as 'response_id',
    //     a.question_id as 'question_id',
    //     a.agri_officer_id as 'agri_officer_id',
    //     a.responded_date_time as 'responded_date_time',
    //     a.content as 'content',
    //     ag.name as 'agri_officer_name',
    //     b.producer_id as 'producer_id',
    //     b.title as 'quesion_title',
    //     b.content as 'quesion_content',
    //     b.asked_date_time as 'asked_date_time',
    //     pr.name as 'producer_name' 
    //     FROM cultivation_question_response a
    //     INNER JOIN cultivation_question b 
    //     ON a.question_id=b.id
    //     INNER JOIN agri_officer ag
    //     ON a.agri_officer_id=ag.id
    //     INNER JOIN producer pr
    //     ON b.producer_id=pr.id
    //     WHERE a.question_id = :id
    //     ORDER BY a.responded_date_time");
    //     $this->db->bind(':id', $id);
    //     $results = $this->db->resultSet();
    //     return $results;
    // }

  }