<?php
    use App\Core\Controller;

    class AdminController extends Controller {

        private $adminmodel;

        function __construct()
        {
            $this->adminmodel = $this->model("AdminModel");
        }
        function Index(){
            $data['admins'] = $this->adminmodel->all();
            $this->view('/admin/admins/index', $data);
        }
        function edit($id){
            $admin=$this->adminmodel->getById($id);
            $data['admin'] = $admin;
            $this->view('/admin/admins/edit', $data);
        }
        function update($id){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $data = $_POST;

                $data['name'] = $_POST['name'];
                $data['fullname'] = $_POST['fullname'];
                $data['phone'] = $_POST['phone'];
                $data["id"] = $id;

                $result = $this->adminmodel->update($data);
                if ($result == true) {
                    $_SESSION['alert']['success'] = true;
                    $_SESSION['alert']['messages'] = "Đã cập nhật thành công!";
                  }else {
                    $_SESSION['alert']['success'] = false;
                    $_SESSION['alert']['messages'] = $result;
                  }
                if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/admin");
                } else {
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
                }
            }
        }
    }

?>