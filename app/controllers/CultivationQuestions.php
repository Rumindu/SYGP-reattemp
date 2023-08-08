<?php
  class CultivationQuestions extends Controller{
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      $this->CultivationQuestionsModel = $this->model('M_CultivationQuestions');
    }

    public function index(){
      $CultivationQuestions = $this->CultivationQuestionsModel->getCultivationQuestions();
      $data = [
        'CultivationQuestion' => $CultivationQuestions
      ];
      //print_r($data);
      $this->view('cultivationQuestions/v_index', $data);
    }

    public function detail($question_id){
      $CultivationQuestions = $this->CultivationQuestionsModel->getCultivationQuestionResponse($question_id);
      
      $data = [
        'CultivationQuestion' => $CultivationQuestions
      ];
      print_r($data);
      $this->view('cultivationQuestions/v_detail', $data);
    }
  }