<?php
  /*
  *Every controller extends this class
  *Loading the models and views
  */
  class Controller{
    // Loading model
    public function model($model){
      // Require model file for loading
      require_once '../app/models/' . $model . '.php';

      // create model object
      return new $model();
    }

    // Loading view
    public function view($view, $data = []){
      // Check for view file
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die('View does not exist');
      }
    }
  }