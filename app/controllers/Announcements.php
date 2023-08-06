<?php
  class Announcements extends Controller{
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      $this->AnnouncementModel = $this->model('M_Announcements');
    }

    public function index(){
      $announcements = $this->AnnouncementModel->getAnnouncements();
      $data = [
        'announcements' => $announcements
      ];
      //print_r($data);
      $this->view('announcements/v_index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'title' => trim($_POST['title']),
          'content' => trim($_POST['content']),
          'title_err' => '',
          'content_err' => ''
        ];

        if(empty($data['title'])){
          $data['title_err'] = 'Please enter a title.';
        }
        if(empty($data['content'])){
          $data['content_err'] = 'Please enter content.';
        }

        if(empty($data['title_err']) && empty($data['content_err'])){
          if($this->AnnouncementModel->addAnnouncement($data)){
            //print_r($data);
            redirect('announcements/index');
          }
          else {
            die('Something went wrong.');
          }
        
        }
        else{
        $this->view('announcements/v_add', $data);
        }
      }

      //loading default view. At initially (/Announcements/add) load this empty view
      else {
        $data = [
          'title' => '',
          'content' => '',
          'title_err' => '',
          'content_err' => ''
        ];
        $this->view('announcements/v_add', $data);
      }
    }

    public function edit($announcement_id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'announcement_id' => $announcement_id,
          'title' => trim($_POST['title']),
          'content' => trim($_POST['content']),
          'title_err' => '',
          'content_err' => ''
        ];

        if(empty($data['title'])){
          $data['title_err'] = 'Please enter a title.';
        }
        if(empty($data['content'])){
          $data['content_err'] = 'Please enter content.';
        }

        if(empty($data['title_err']) && empty($data['content_err'])){
          if($this->AnnouncementModel->editAnnouncement($data)){
            //print_r($data);
            redirect('announcements/index');
          }
          else {
            die('Something went wrong.');
          }
        
        }
        else{
        $this->view('announcements/v_edit', $data);
        }
      }

      else {
        $announcement = $this->AnnouncementModel->getPostId($announcement_id);
        //print_r($announcement);
        
        // check for owner
        if($announcement->agri_officer_id != $_SESSION['user_id']){
            redirect("announcements/Index");
        }
        else{
        $data = [
          'title' => $announcement->title,
          'content' => $announcement->content,
          'title_err' => '',
          'content_err' => ''
        ];
        $this->view('announcements/v_edit', $data);
        }
      }

    }

    // public function delete($announcement_id){
    //   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     if($this->AnnouncementModel->deleteAnnouncement($announcement_id)){
    //       redirect('announcements/index');
    //     }
    //     else {
    //       die('Something went wrong.');
    //     }
    //   }
    //   else {
       
    //     redirect('announcements/index');
    //   }
    // }

    public function delete($announcement_id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->AnnouncementModel->deleteAnnouncement($announcement_id)){
          redirect('announcements/index');
        }
        else {
          die('Something went wrong.');
        }
      }

      else {
        $announcement = $this->AnnouncementModel->getPostId($announcement_id);
        if($announcement->agri_officer_id != $_SESSION['user_id']){
            redirect("announcements/Index");
        }
        else{
        
        $this->view('announcements/v_delete_conf');
        }
      }

    }
    
  }
  