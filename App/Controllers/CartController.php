<?php
use App\Core\Controller;

class CartController extends Controller {

        private $itemsmodel;
        private $profilemodel;
        function __construct()
        {
            $this->itemsmodel = $this->model('CartModel');
            $this->profilemodel = $this->model('ProfileModel');
        }
        function Index(){
            if(isset($_SESSION['user'])){
                $id = $_SESSION['user']['id'];
                $data['user'] = $this->profilemodel->getById($id);
                $data['item'] = $this->itemsmodel->getItemInCartByUser($id);
                // var_dump($data['item']);
            }
            $this->view('/cart/index',$data);
        }
        
        function addToCart(){
            if (isset($_GET)) {
            $result = $this->itemsmodel->addToCart($_GET);
            echo json_encode($result);
            return;
            }
        }
        function amountInCart(){
            if (isset($_SESSION['user'])) {
            $amount = $this->itemsmodel->amountInCart($_SESSION['user']['id']);
            echo $amount;
            } else {
            echo 0;
            }
        }
        function delete(){
            if(isset($_GET)){
                $result = $this->itemsmodel->deleteInCart($_GET);
                if ($result) {
                    header("Location: " . DOCUMENT_ROOT . "/cart");
                }
            }
        }
    }

?>