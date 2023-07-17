<!-- When file naming controllers are plural -->
<?php
  class Announcements extends Controller{
    public function __construct(){
      $this->AnnouncementModel = $this->model('Announcement');
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
  