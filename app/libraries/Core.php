<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Users';
    protected $currentMethod = 'login';
    protected $params = [];

    public function __construct(){
      //print_r($this->getUrl());
      
      $url = $this->getUrl();

      if(isset($url[0])){
        // if there isn't this condition "Warning: Trying to access array offset on value of type null in C:\xampp\htdocs\SYGP\app\libraries\Core.php on line 19"

        // Look in controllers for first value
        //ucwords() - Capitalize the first letter
      if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
          // If exists, set as controller
          $this->currentController = ucwords($url[0]);
          // Unset 0 Index
          unset($url[0]);
        }
      }
      
      // Require the controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Get method from checking second part of url
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }
      
      //get params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl(){
      if(isset($_GET['url'])){
        // removing the last "/" from the url
        $url = rtrim($_GET['url'], '/');
        // sanitize the url
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // breaking the url into an array
        $url = explode('/', $url);
        return ($url);
      }
    }
  }