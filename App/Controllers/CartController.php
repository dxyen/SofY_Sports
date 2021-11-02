<?php
use App\Core\Controller;

class CartController extends Controller {

        private $cartmodel;
        private $profilemodel;
        function __construct()
        {
            $this->cartmodel = $this->model('CartModel');
            $this->profilemodel = $this->model('ProfileModel');
        }
        function Index(){
            if(isset($_SESSION['user'])){
                $id = $_SESSION['user']['id'];
                $data['user'] = $this->profilemodel->getById($id);
                $data['item'] = $this->cartmodel->getItemInCartByUser($id);
                // var_dump($data['item']);
            }
            if(isset($data)){
                $this->view('/cart/index',$data);
            }else {
                $data = 0;
                $this->view('/cart/index', $data);
            }
        }
        
        function addToCart(){
            if (isset($_GET)) {
            $result = $this->cartmodel->addToCart($_GET);
            echo json_encode($result);
            return;
            }
        }
        function changeAmount(){
            if (isset($_GET)) {
                // var_dump($_GET);
            $result = $this->cartmodel->changeAmount($_GET);
            echo json_encode($result);
            // return;
            }
        }
        function amountInCart(){
            if (isset($_SESSION['user'])) {
            $amount = $this->cartmodel->amountInCart($_SESSION['user']['id']);
            echo $amount;
            } else {
            echo 0;
            }
        }
        function delete(){
            if(isset($_GET)){
                $result = $this->cartmodel->deleteInCart($_GET);
                if ($result) {
                    header("Location: " . DOCUMENT_ROOT . "/cart");
                }
            }
        }

        function checkBuy(){
            if (isset($_POST)) {
                // var_dump($_POST);
                $result = $this->cartmodel->order($_POST);
                if ($result > 0) {
                    $_SESSION['alert']['success'] = true;
                    $_SESSION['alert']['messages'] = "Đặt hàng thành công!";
                } else {
                    $_SESSION['alert']['success'] = false;
                    $_SESSION['alert']['messages'] = "Đặt hàng thất bại!";
                }
                $data['userId'] = $_SESSION['user']['id'];
                if (isset($_SESSION['user'])) {
                    $result2 = $this->cartmodel->getItemInCartByUser($_SESSION['user']['id']);
                }
                foreach($result2 as $index => $item){
                    $data['itemId'] = $item['id'];
                    $check=$this->cartmodel->orderDetail($result, $item['id'], $item['amount']);
                    $delete = $this->cartmodel->deleteInCart($data);
                }
                header("Location: " . DOCUMENT_ROOT . "/cart");
            }
        }
    }

?>