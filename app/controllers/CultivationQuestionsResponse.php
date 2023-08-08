<?php
  class CultivationQuestionsResponse extends Controller{
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      $this->CultivationQuestionsResponseModel = $this->model('M_CultivationQuestionsResponse');
    }
    
    public function add($id){
      echo $id;
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'question_id'=>$id,
          'content' => trim($_POST['content']),
          'content_err' => ''
        ];
        print_r($data);

        if(empty($data['content'])){
          $data['content_err'] = 'Please enter content.';
        }

        if(empty($data['content_err']) ){
          if($this->CultivationQuestionsResponseModel->add($data)){
            //print_r($data);
            $redirecturl='CultivationQuestions/detail/'.$id;
            redirect($redirecturl);
          }
          else {
            die('Something went wrong.');
          }
        
        }
        else{
        $this->view('cultivationQuestionsResponses/v_add', $data);
        }
      }

      //loading default view. At initially (/cultivationQuestionsResponses/add) load this empty view
      else {
        $data = [
          'content' => '',
          'content_err' => ''
        ];
        $this->view('cultivationQuestionsResponses/v_add', $data);
      }
    }

    
  }