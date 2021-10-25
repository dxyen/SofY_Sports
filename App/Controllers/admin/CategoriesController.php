<?php 
    use App\Core\Controller;

    class CategoriesController extends Controller {
        private $productsmodel;
        function __construct()
        {
            $this->productsmodel = $this->model('productsmodel');
            $this->productsmodel = $this->model('productsmodel');
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
    }
?>