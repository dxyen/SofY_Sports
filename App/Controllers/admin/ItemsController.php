<?php 
    use App\Core\Controller;

    class ItemsController extends Controller {
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
    }
?>