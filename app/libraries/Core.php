<?php
  /**
   * App Core Class
   * Creates URL & loads core controller
   * URL Format => /controller/method/params
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $url = $this->getUrl();
      // Looks for controller
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // Set Controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }
      // Require Controller
      require_once '../app/controllers/' . $this->currentController . '.php';
      // instanciate controller's class
      $this->currentController = new $this->currentController;

      // Check the second part of url
      if (isset($url[1])) {
        if (method_exists($this->currentController, $url[1])) {
          $this->currentMethod = $url[1];
          // Unset 1 Index
          unset($url[1]);
        }
      }

      // Get Params
      if ($url) {
        $this->params = array_values($url);
      }else {
        $this->params = [];
      }

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod],
        $this->params
      );

    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }
