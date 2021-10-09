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
        function information(){
            $this->view('/user/index');
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

        function signout(){
            unset($_SESSION['user']);
            header("Location: " . DOCUMENT_ROOT);
            return;
        }

        function checkname(){
            // var_dump($_GET['name']);
            if(isset($_GET['name'])){
                $result = $this->usermodel->CheckName($_GET['name']);
                if ($result == true) {
                    echo "true";
                    return;
                  } else {
                    echo "false";
                    return;
                }
            }
            echo "false";
        }
        function update(){

            $data = $_SESSION['user']['id'];
            $result = $this->usermodel->updateUser($data);
            if ($result === true) {
                $data['user'] = $result;
                $_SESSION['userAlert']['success'] = true;
                $_SESSION['userAlert']['message'] = "Cập nhật thành công";
              } else {
                $_SESSION['userAlert']['success'] = false;
                $_SESSION['userAlert']['message'] = $result;
              }
              $this->view('/user/information', $data);
        }
    }

?>