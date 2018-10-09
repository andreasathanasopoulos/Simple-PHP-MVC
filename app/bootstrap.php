<?php
  // Load Config
  require_once 'config/config.php';

  // Load Libraries
  // require_once 'libraries/Core.php';
  // require_once 'libraries/Controller.php';
  // require_once 'libraries/Database.php';

  // Autoload Core libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
