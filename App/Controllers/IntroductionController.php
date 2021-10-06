<?php
    use App\Core\Controller;

    class IntroductionController extends Controller {
        function index(){
            $this->view("/introduction/index");
        }

    }
?>