<?php

  // Load Config
  require_once 'config/config.php';


  // Autoload Core Libraries bo need to includes manually
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });