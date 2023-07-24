<?php
  class Announcements extends Controller{
    public function __construct(){
      $this->AnnouncementModel = $this->model('M_Announcements');
    }

    public function index(){
      $announcements = $this->AnnouncementModel->getAnnouncements();

      $data = [
        'title' => 'Welcome123',
        'announcements' => $announcements
      ];
      $this->view('pages/index', $data);
    }

    
  }
  