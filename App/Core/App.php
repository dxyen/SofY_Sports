<?php

    namespace App\Core;

    class App {
      protected $controller= "Home";
      protected $action= "Index";
      protected $params=[];

      function __construct(){
        $arr = $this->UrlProcess();
        $GLOBALS['currentRoute'] = $arr[0];

        if(strtolower($arr[0]) == "admin"){

          $GLOBALS['currentRoute'] = $arr[1];

          unset($arr[0]);
          // Xử lí controller
          if(file_exists(CONTROLLER . DS . "admin" . DS . ucfirst($arr[1]) . "Controller.php")){
              $this->controller = ucfirst($arr[1]);
              unset($arr[1]); 
          }
          $this->controller = $this->controller . "Controller";
          require_once "./App/Controllers/admin/".$this->controller.".php";

          $this->controller = new $this->controller;

          // Xử lí Action
          if (isset($arr[2])) {
              if (method_exists($this->controller, $arr[2])) {
                  $this->action = $arr[2];
                 
              }
              unset($arr[2]);
          }
          // Xu li params
          $this->params = $arr?array_values($arr):[];

          //Goi ham 
          call_user_func_array([$this->controller, $this->action], $this->params );
        } else {

          // Xử lí controller
          if(file_exists("./App/Controllers/". ucfirst($arr[0]) ."Controller.php")){
              $this->controller = ucfirst($arr[0]);
              unset($arr[0]); 
          }
          $GLOBALS["currentPage"] = $this->controller;
          $this->controller = $this->controller . "Controller";
          require_once "./App/Controllers/".$this->controller.".php";

          $this->controller = new $this->controller;

          // Xử lí Action
          if (isset($arr[1])) {
              if (method_exists($this->controller, $arr[1])) {
                  $this->action = $arr[1];
                  
              }
              unset($arr[1]);
          }
          $GLOBALS["currentType"] = $this->action;
          // Xu li params
          $this->params = $arr?array_values($arr):[];

          //Goi ham 
          call_user_func_array([$this->controller, $this->action], $this->params );
        }
      }
      function UrlProcess(){
          if(isset($_GET["url"])){
              $url = explode("/", filter_var(trim($_GET["url"], "/")));
              if ($url[0] == "admin") {
              if (!isset($url[1])) {
                return [
                  "admin",
                  "Home",
                  "Index"
                ];
              }
              }
            return $url;
          }else {
              return [
                  "Home",
                  "Index"
              ];
          }
      }
    }
?>