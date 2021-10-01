<?php
    use App\Core\Controller;

    class CartController extends Controller {

        private $cartmodel;
        function __construct()
        {
            // $this->itemsmodel = $this->model('CartModel');
        }
        function Index(){
            $this->view('/cart/index');
        }
    }

?>