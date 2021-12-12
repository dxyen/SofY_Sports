<?php 
    use App\Core\Controller;

    class CategoriesController extends Controller {
        private $productsmodel;
        function __construct()
        {
            $this->productsmodel = $this->model('productsmodel');
            $this->categorymodel = $this->model('categorymodel');
        }
        function index(){
            $data['categories'] = $this->productsmodel->allCategories();
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $this->view("/admin/categories/index", $data);
        }
        function create(){
            $categories = $this->productsmodel->allCategories();
            $data['categories'] = $categories;
            $this->view('/admin/categories/create', $data);
        }
        function edit($id){
            $categories=$this->categorymodel->getById($id);
            $data['categories'] = $categories;
            $this->view('/admin/categories/edit', $data);
        }
        function update($id){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $category = $this->categorymodel->getById($id);
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

                    move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CATEGORIES_IMAGES . DS . $newImageName);
                    $data["image"] = $newImageName;
                    unlink(PUBLIC_DIR_CATEGORIES_IMAGES . DS . $category['image']);
                } else {
                    $data['image'] = $category['image'];
                }

                $result = $this->categorymodel->update($data);
                if ($result == true) {
                    $_SESSION['alert']['success'] = true;
                    $_SESSION['alert']['messages'] = "Đã cập nhật thành công!";
                  }else {
                    $_SESSION['alert']['success'] = false;
                    $_SESSION['alert']['messages'] = $result;
                  }
                if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/categories");
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

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CATEGORIES_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            }

            $result = $this->categorymodel->store($data);
            if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/categories");
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
                    header("Location: " . DOCUMENT_ROOT . "/admin/categories");
                } else {
                    if (isset($_SERVER["HTTP_REFERER"])) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }
    }
?>