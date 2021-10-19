<?php
    namespace App\Core;
    class Controller {
        function model($model){
            if(file_exists(MODEL . DS . $model .'.php')){
                require_once(MODEL . DS . $model .'.php');
                return new $model;
            }
        }
        function view ($view, $data = []) {
            if (file_exists(VIEW . DS . $view . '.php')) {
                if(strpos($view, "admin") !== false){
                    require_once(VIEW . DS . 'admin/shared/layout.php');
                }else{
                    require_once(VIEW . DS . 'shared/layout.php');
                }
                return;
              } else {
                die('Not found view: ' . $view);
              }
        }
    }
?>