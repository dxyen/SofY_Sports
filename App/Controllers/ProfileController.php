<?php
    use App\Core\Controller;

    class ProfileController extends Controller {

        private $profilemodel;

        function __construct()
        {
            $this->profilemodel = $this->model("ProfileModel");
        }
        function Index(){
            // var_dump ($_SESSION['user']);
            // $data = [];
            if(isset($_SESSION['user'])){
                $id = $_SESSION['user']['id'];
                $data['user'] = $this->profilemodel->getById($id);
                // var_dump($data['user']);
                $_SESSION['user']['avatar'] = $data['user']['avatar'];
                // var_dump($_SESSION['user']['avatar']);
            }
            $this->view('/profile/index', $data);
        }
        function update($id){
            $data = $_POST;
            $data['id'] = $id;
            // var_dump($data);
            $result = $this->profilemodel->update($data, $_FILES);
            // if ($result === true) {
            //     $_SESSION['userAlert']['success'] = true;
            //     $_SESSION['userAlert']['message'] = "Cập nhật thành công";
            //   } else {
            //     $_SESSION['userAlert']['success'] = false;
            //     $_SESSION['userAlert']['message'] = $result;
            //   }
            header("Location: " . DOCUMENT_ROOT . "/profile");
        }
    }

?>