<?php 
    use App\Core\Controller;

    class DiscountsController extends Controller {
        private $itemsmodel;
        function __construct()
        {
            $this->itemsmodel = $this->model('itemsmodel');
        }

        function index(){
            $data['items'] = $this->itemsmodel->allItemDiscount();
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $this->view("/admin/discounts/index", $data);
        }

        function create(){
            $item = $this->itemsmodel->allItem();
            $data['item'] = $item;
            $this->view('/admin/discounts/create', $data);
        }

        function edit($id){
            $item = $this->itemsmodel->getById($id);
            // $categories=$this->productsmodel->allCategories();
            if(!$item){
                header("Location: " . DOCUMENT_ROOT . "/admin/items");
            }
            // $data['categories'] = $categories;
            $data['item'] = $item;
            $this->view('/admin/discounts/edit', $data);
        }

        function store(){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin/discounts");
            }

            $data = $_POST;
            // var_dump($data);
            $data['items'] = $this->itemsmodel->getById($data['itemId']);

            $result = $this->itemsmodel->storeDiscount($data);
            if ($result == true) {
                $_SESSION['alert']['success'] = true;
                $_SESSION['alert']['messages'] = "Đã thêm thành công!";
              }else {
                $_SESSION['alert']['success'] = false;
                $_SESSION['alert']['messages'] = "Sản phẩm đã có trong Discounts";
              }
            if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/discounts");
            } else {
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . DOCUMENT_ROOT . "/admin/discounts");
                }
            }
        }
        function delete($id){
            $result = $this->itemsmodel->deleteDiscount($id);
            if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/discounts");
            } else {
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
            }
        }
    }
?>