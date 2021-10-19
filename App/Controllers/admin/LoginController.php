<?php
    use App\Core\Controller;

    class LoginController extends Controller {

        private $staffmodel;

        function __construct()
        {
            $this->staffmodel = $this->model("UserAdminModel");
        }
        function Index(){
            $this->view('/admin/login/index');
        }

        function authenticateAdmin(){
            // var_dump($_POST);
            if (isset($_POST)) {
            $result = $this->staffmodel->authenticateAdmin($_POST);
            if ($result === true) {
                $user = $this->staffmodel->getByNameAdmin($_POST['name']);
                $_SESSION['admin'] = $user;
                header("Location:" . DOCUMENT_ROOT . "/admin");
                return;
            } else {
                $data['error'][] = $result;
            }
            } else {
            $data['error'][] = "Không gửi được!";
            }
            $this->view('/admin/login/index', $data);
        }

        function signout(){
            unset($_SESSION['admin']);
            header("Location: " . DOCUMENT_ROOT . "/admin");
            return;
        }
    }

?>