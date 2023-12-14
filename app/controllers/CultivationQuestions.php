<?php
  class CultivationQuestions extends Controller{
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      $this->CultivationQuestionsModel = $this->model('M_CultivationQuestions');
    }

    public function index(){
      $CultivationQuestionCategoryList = $this->CultivationQuestionsModel->getCultivationQuestionCategoryList();
      $CultivationQuestions = $this->CultivationQuestionsModel->getCultivationQuestions();
      $data = [
        'CultivationQuestionCategoryList' => $CultivationQuestionCategoryList,
        'CultivationQuestion' => $CultivationQuestions,
        'ActiveTab' => 'all',
        'activeLink' => 'CultivationQuestions'
      ];
      $this->view('cultivationQuestions/v_index', $data);
    }

    public function detail($question_id){
    
      $CultivationQuestions = $this->CultivationQuestionsModel->getCultivationQuestionResponse($question_id);
      
      
      if (!empty($CultivationQuestions)) {
        $data = [
        'CultivationQuestion' => $CultivationQuestions,
        'activeLink' => 'CultivationQuestions'
        ];
        $this->view('cultivationQuestions/v_detail', $data);
      }
      else{
        $CultivationQuestions = $this->CultivationQuestionsModel->getCultivationQuestions0Response($question_id);
        $data = [
          'CultivationQuestion' => $CultivationQuestions,
          'activeLink' => 'CultivationQuestions'
          ];
        
        $this->view('cultivationQuestions/v_details0response', $data);
      }
    
      }

      public function add(){
        $category = $this->CultivationQuestionsModel->getCultivationQuestionCategoryList();
        if($_SESSION['user_role'] != 'Producer'){
          redirect('cultivationQuestions/index');
        }
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
              'title' => trim($_POST['title']),
              'content' => trim($_POST['content']),
              'title_err' => '',
              'content_err' => '',
              'category' => $category,
              'scategory' => trim($_POST['scategory']),
              'scategory_err' => '',
              'activeLink' => 'CultivationQuestions'
            ];
    
            if(empty($data['title'])){
              $data['title_err'] = 'Please enter a title.';
            }
            if(empty($data['content'])){
              $data['content_err'] = 'Please enter content.';
            }
            if(empty($data['scategory'])){
              $data['scategory_err'] = 'Please choose a category.';
            }
            if(empty($data['title_err']) && empty($data['content_err']) && empty($data['scategory_err'])){
              if($this->CultivationQuestionsModel->add($data)){
                //print_r($data);
                redirect('CultivationQuestions/index');
              }
              else {
                die('Something went wrong.');
              }
            
            }
            else{
            $this->view('cultivationQuestions/v_add', $data);
            }
          }
    
          //loading default view. At initially (/Announcements/add) load this empty view
          else {
            $data = [
              'title' => '',
              'content' => '',
              'title_err' => '',
              'content_err' => '',
              'category' => $category,
              'scategory' => '',  
              'scategory_err' => '',
              'activeLink' => 'CultivationQuestions'
            ];
            //print_r($data);
            $this->view('cultivationQuestions/v_add', $data,);
          }
      }

      public function category($name){
        $CultivationQuestionCategoryList = $this->CultivationQuestionsModel->getCultivationQuestionCategoryList();
        $CultivationQuestions = $this->CultivationQuestionsModel->getCultivationQuestionsByCategory($name);
        $data = [
          'CultivationQuestion' => $CultivationQuestions,
          'CultivationQuestionCategoryList' => $CultivationQuestionCategoryList,
          'ActiveTab' => $name,
          'activeLink' => 'CultivationQuestions'
        ];
        //viewing empty page when there is no content of CultivationQuestions
        if(empty($data['CultivationQuestion'])){
          $this->view('cultivationQuestions/v_0index', $data);
        }
        else{
          $this->view('cultivationQuestions/v_index', $data);
        }
       }
      

    
  }