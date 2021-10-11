<?php
    use App\Core\Controller;

    class CartController extends Controller {

        private $itemsmodel;
        function __construct()
        {
            $this->itemsmodel = $this->model('CartModel');
        }
        function Index(){
            $this->view('/cart/index');
        }
        
        function addToCart(){
            if (isset($_GET)) {
            $result = $this->itemsmodel->addToCart($_GET);
            echo json_encode($result);
            return;
            }
        }
    }

?>