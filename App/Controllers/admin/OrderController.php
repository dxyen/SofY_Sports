<?php
    use App\Core\Controller;

    class OrderController extends Controller {

        private $ordermodel;

        function __construct()
        {
            $this->ordermodel = $this->model("OrderModel");
        }
        function Index(){
            $this->view('/admin/orders/index');
        }
    }

?>