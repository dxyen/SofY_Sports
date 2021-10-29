<?php
    use App\Core\Controller;

    class HomeController extends Controller {
        private $itemsmodel;
        private $productsmodel;
        private $ordermodel;

        function __construct()
        {
            $this->itemsmodel = $this->model('itemsmodel');
            $this->productsmodel = $this->model('productsmodel');
            $this->ordermodel = $this->model('ordermodel');
        }
        function Index(){
            $data['numOfItems'] = $this->itemsmodel->getAllNumber();
            $data['numOfProducts'] = $this->productsmodel->getAllNumber();
            $data['numOfOrder'] = $this->ordermodel->getAllNumber();

            $this->view("/admin/home/index", $data);
        }
    }
?>