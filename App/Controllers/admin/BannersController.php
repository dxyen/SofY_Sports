<?php 
    use App\Core\Controller;

    class BannersController extends Controller {
        private $itemsmodel;
        private $productsmodel;
        function __construct()
        {
            $this->bannersmodel = $this->model('bannermodel');
        }

        function index(){
            $data['banner'] = $this->bannersmodel->all();
            
            $this->view("/admin/banners/index", $data);
        }
        function create(){
            $this->view('/admin/banners/create');
        }

        function store(){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin/banners");
            }

            $data = $_POST;
            $data['image'] = "";
            if (isset($_FILES["image"])) {
                if ($_FILES["image"]['name'] != "") {
                    $randomNum = time();
                    $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                    $imageExt = substr($imageName, strrpos($imageName, '.'));
                    $imageExt = str_replace('.', '', $imageExt);
                    $newImageName = $randomNum . '.' . $imageExt;
    
                    move_uploaded_file($_FILES["image"]["tmp_name"], IMAGES_URL . DS . $newImageName);
                    $data["image"] = $newImageName;
                }
                }
            // var_dump($data);

            $result = $this->bannersmodel->store($data);
            if ($result == true) {
                $_SESSION['alert']['success'] = true;
                $_SESSION['alert']['messages'] = "Đã thêm thành công!";
              }else {
                $_SESSION['alert']['success'] = false;
                $_SESSION['alert']['messages'] = $result;
              }
            if ($result) {
            header("Location: " . DOCUMENT_ROOT . "/admin/banners");
            } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
            }
        }
        function delete($id){
            $result = $this->bannersmodel->delete($id);
            if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/banners");
            } else {
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
            }
        }
    }
?>