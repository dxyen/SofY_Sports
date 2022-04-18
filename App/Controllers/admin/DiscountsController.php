<?php 
    use App\Core\Controller;

    class DiscountsController extends Controller {
        private $itemsmodel;
        private $productsmodel;
        function __construct()
        {
            $this->itemsmodel = $this->model('itemsmodel');
            $this->productsmodel = $this->model('productsmodel');
        }

        function index(){
            $data['items'] = $this->itemsmodel->allItem();
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $this->view("/admin/items/index", $data);
        }

        function create(){
            $categories = $this->productsmodel->allCategories();
            $data['categories'] = $categories;
            $this->view('/admin/items/create', $data);
        }

        function edit($id){
            $item = $this->itemsmodel->getById($id);
            $categories=$this->productsmodel->allCategories();
            if(!$item){
                header("Location: " . DOCUMENT_ROOT . "/admin/items");
            }
            $data['categories'] = $categories;
            $data['item'] = $item;
            $this->view('/admin/items/edit', $data);
        }
        function update($id){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $item = $this->itemsmodel->getById($id);
                $data = $_POST;

                $data['name'] = $_POST['name'];
                $data['categoryId'] = $_POST['categoryId'];
                $data['price'] = $_POST['price'];
                $data['description'] = $_POST['description'];
                $data["id"] = $id;
                
                if (isset($_FILES["image"]['name'])) {
                    if($_FILES["image"]['name'] !=""){
                        $randomNum = time();
                        $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                        $imageExt = substr($imageName, strrpos($imageName, '.'));
                        $imageExt = str_replace('.', '', $imageExt);
                        $newImageName = $randomNum . '.' . $imageExt;

                        move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_ITEM_IMAGES . DS . $newImageName);
                        $data["image"] = $newImageName;
                        unlink(PUBLIC_DIR_ITEM_IMAGES . DS . $item['image']);
                    }else {
                        $data['image'] = $item['image'];
                    }
                }

                $result = $this->itemsmodel->update($data);
                if ($result == true) {
                    $_SESSION['alert']['success'] = true;
                    $_SESSION['alert']['messages'] = "Đã cập nhật thành công!";
                  }else {
                    $_SESSION['alert']['success'] = false;
                    $_SESSION['alert']['messages'] = $result;
                  }
                if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/items");
                } else {
                    if (isset($_SERVER["HTTP_REFERER"])) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }

        function store(){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin/items");
            }

            $data = $_POST;

            $data['name'] = $_POST['name'];
            $data['categoryId'] = $_POST['categoryId'];
            $data['price'] = $_POST['price'];
            $data['description'] = $_POST['description'];
            $data["image"] = "";

            // handle image
            if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_ITEM_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            }
            }

            $result = $this->itemsmodel->store($data);
            if ($result == true) {
                $_SESSION['alert']['success'] = true;
                $_SESSION['alert']['messages'] = "Đã thêm thành công!";
              }else {
                $_SESSION['alert']['success'] = false;
                $_SESSION['alert']['messages'] = $result;
              }
            if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/items");
            } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
            }
        }
        function delete($id){
            $itemdelete = $this->itemsmodel->getById($id);
            if(!$itemdelete){
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $result = $this->itemsmodel->delete($id);
                if ($result) {
                    header("Location: " . DOCUMENT_ROOT . "/admin/items");
                } else {
                    if (isset($_SERVER["HTTP_REFERER"])) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }
    }
?>