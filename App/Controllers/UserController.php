<?php
    use App\Core\Controller;

    class UserController extends Controller {

        private $usermodel;

        function __construct()
        {
            $this->usermodel = $this->model("UserModel");
        }
        function Index(){
            $this->view('/user/login');
        }
        function Register(){
            $this->view('/user/register');
        }

        function signup(){
            if (isset($_POST)) {
                $result = $this->usermodel->register($_POST);
                if ($result === true) {
                    $data['message'][] = "Bạn đã đăng ký thành công. Mời đăng nhập!";
                    $this->view('/user/login', $data);
                } else {
                    $data['error'][] = "Đăng ký không thành công!";
                    $this->view('/user/register', $data);
                    return;
                }
            }
        }

        function authenticate(){
            if (isset($_POST)) {
            $result = $this->usermodel->authenticate($_POST);
            if ($result === true) {
                $user = $this->usermodel->getByName($_POST['name']);
                $_SESSION['user'] = $user;
                header("Location: " . DOCUMENT_ROOT);
                return;
            } else {
                $data['error'][] = $result;
            }
            } else {
            $data['error'][] = "Không gửi được!";
            }
            $this->view('/user/login', $data);
        }

    }

?>