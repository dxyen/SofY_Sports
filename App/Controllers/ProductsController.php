<?php
    use App\Core\Controller;

    class ProductsController extends Controller {
        private $productsmodel;

        function __construct()
        {
            $this->productsmodel = $this->model('categorymodel');
        }
        function Index(){
            if(!isset($_GET['id'])){
                $idType = 1;
            }
            else{
                $idType = $_GET['id'];
            }
            $items = $this->productsmodel->getItemsByCategories($idType);
            $data['items'] = $items;
            $this->view("/products/index", $data);
        }
    }
?>