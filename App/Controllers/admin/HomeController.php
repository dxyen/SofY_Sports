<?php
    use App\Core\Controller;

    class HomeController extends Controller {

        function __construct()
        {
           
        }
        function Index(){
            $this->view("/admin/home/index");
        }
    }
?>