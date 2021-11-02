<?php
    use App\Core\Controller;

    class CustomerController extends Controller {

        private $customermodel;

        function __construct()
        {
            $this->customermodel = $this->model("CustomerModel");
        }
        function Index(){
            $data['customer'] = $this->customermodel->all();
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $this->view('/admin/customers/index', $data);
        }
        function create(){
            $this->view('/admin/customers/create');
        }
        function edit($id){
            $customer=$this->categorymodel->getById($id);
            $data['customer'] = $customer;
            $this->view('/admin/customers/edit', $data);
        }
        function update($id){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $data = $_POST;

                $data['name'] = $_POST['name'];
                $data['description'] = $_POST['description'];
                $data["id"] = $id;
                
                if ($_FILES["image"]['name'] != "") {
                    $randomNum = time();
                    $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                    $imageExt = substr($imageName, strrpos($imageName, '.'));
                    $imageExt = str_replace('.', '', $imageExt);
                    $newImageName = $randomNum . '.' . $imageExt;

                    move_uploaded_file($_FILES["image"]["tmp_name"],  DS . $newImageName);
                    $data["image"] = $newImageName;
                }

                $result = $this->categorymodel->update($data);
                if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/customer");
                } else {
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
                }
            }
        }
        function store(){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin");
            }

            $data = $_POST;

            $data['name'] = $_POST['name'];
            $data['description'] = $_POST['description'];
            $data["image"] = "";

            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], DS . $newImageName);
                $data["image"] = $newImageName;
            }

            $result = $this->categorymodel->store($data);
            if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/customer");
            } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
            }
        }
        function delete($id){
            $categorydelete = $this->categorymodel->getById($id);
            if(!$categorydelete){
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $result = $this->categorymodel->delete($id);
                if ($result) {
                    header("Location: " . DOCUMENT_ROOT . "/admin/customer");
                } else {
                    if (isset($_SERVER["HTTP_REFERER"])) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }
    }

?>