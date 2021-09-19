<?php
    use App\Core\Controller;

    class AccountController extends Controller {

        // private $usermodel;

        function __construct()
        {
            // $this->usermodel = $this->model("UserModel");
        }
        function Index(){
            $this->view('/account/login');
        }
        function Register(){
            $this->view('/account/register');
        }
    }
?>