
<?php
  class CultivationDetails extends Controller{
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      $this->CultivationDetailsModel = $this->model('M_CultivationDetails');
    }

    public function index(){
      $cultivationDetails = $this->CultivationDetailsModel->getCultivationDetails();
      $data = [
        'cultivationDetails' => $cultivationDetails,
        'activeLink' => 'CultivationDetails'
      ];
      //print_r($data);
      $this->view('cultivationDetails/v_index', $data);
    }
  }