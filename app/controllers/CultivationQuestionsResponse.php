<?php
  class CultivationQuestionsResponse extends Controller{
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if($_SESSION['user_role'] != 'Agri Officer'){
        redirect('Announcements/index');
      }
      $this->CultivationQuestionsResponseModel = $this->model('M_CultivationQuestionsResponse');
    }
    
    public function add($id){
      if($_SESSION['user_role'] != 'Agri Officer'){
        redirect('cultivationQuestions/index');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'question_id'=>$id,
          'content' => trim($_POST['content']),
          'content_err' => '',
          'activeLink' => 'CultivationQuestions'
        ];
        //print_r($data);

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
          'content_err' => '',
          'activeLink' => 'CultivationQuestions'
        ];
        $this->view('cultivationQuestionsResponses/v_add', $data);
      }
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $response = $this->CultivationQuestionsResponseModel->getCultivationQuestionResponseID($id);
        $data = [
          'questions_response_id'=>$id,
          'content' => trim($_POST['content']),
          'content_err' => '',
          'activeLink' => 'CultivationQuestions',
        ];

        if(empty($data['content'])){
          $data['content_err'] = 'Please enter content.';
        }

        if(empty($data['content_err']) ){
          if($this->CultivationQuestionsResponseModel->editCultivationQuestionResponse($data)){
            $redirecturl='CultivationQuestions/detail/'.$response->question_id;
            redirect($redirecturl);
          }
          else {
            die('Something went wrong.');
          }
        
        }
        else{
        $this->view('cultivationQuestionsResponses/v_edit', $data);
        }
      }

      //loading default view. At initially (/cultivationQuestionsResponses/add) load this empty view
      else {
        $response = $this->CultivationQuestionsResponseModel->getCultivationQuestionResponseID($id);
        $data = [
          'id'=>$id,
          'content' => $response->content,
          'content_err' => '',
          'question_id'=>$response->question_id,
          'activeLink' => 'CultivationQuestions'
        ];
        print_r($data);
        $this->view('cultivationQuestionsResponses/v_edit', $data);
      }
    }

     public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $response = $this->CultivationQuestionsResponseModel->getCultivationQuestionResponseID($id);
        if
        ($this->CultivationQuestionsResponseModel->deleteCultivationQuestionResponse($id)){
          // $redirecturl='CultivationQuestions/detail/'.$response->question_id;
          // redirect($redirecturl);
          redirect('CultivationQuestions/detail/'.$response->question_id);
        }
        else {
          die('Something went wrong.');
        }
      }

      else {
        $response = $this->CultivationQuestionsResponseModel->getCultivationQuestionResponseID($id);
        if($response->agri_officer_id != $_SESSION['user_id']){
            redirect('CultivationQuestions/detail/'.$response->question_id);
        }
        else{
        $data=[
          'id'=>$response->question_id,
          'activeLink' => 'CultivationQuestions'
        ];
        $this->view('cultivationQuestionsResponses/v_delete_conf',$data);
        }
      }

    }


    
  }