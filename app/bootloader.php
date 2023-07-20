<?php
  // Load Helpers
  require_once 'helpers/URL_helper.php';
  require_once 'helpers/Session_Helper.php';
  
  // Load Config
  require_once 'config/config.php';

  // Autoload Core Libraries don't need to includes manually
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });