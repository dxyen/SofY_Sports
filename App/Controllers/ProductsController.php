<?php
    use App\Core\Controller;

    class ProductsController extends Controller {
        private $productsmodel;

        function __construct()
        {
            $this->productsmodel = $this->model('categorymodel');
        }
        function index(){
            
        }
        function categories(){
            if(isset($_GET['id'])){
                $idType = $_GET['id'];
            }

            $items = $this->productsmodel->getItemsByCategories($idType);
            $data['items'] = $items;
            $this->view("/products/index", $data);
        }
    }
?>