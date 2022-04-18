<?php
use App\Core\Controller;

class CartController extends Controller {

        private $cartmodel;
        private $profilemodel;
        function __construct()
        {
            $this->cartmodel = $this->model('CartModel');
            $this->profilemodel = $this->model('ProfileModel');
            $this->itemsmodel = $this->model('itemsmodel');
        }
        function Index(){
            if(isset($_SESSION['user'])){
                $id = $_SESSION['user']['id'];
                $data['user'] = $this->profilemodel->getById($id);
                $data['item'] = $this->cartmodel->getItemInCartByUser($id);

                // echo '<pre>';
                // print_r($data['item']);
                // echo '</pre>';
                
                // lay ra star cua san pham 
                if ($data['item'] != false) {
                    foreach($data['item'] as $index =>$item){
                        $data['comment'][$index] = $this->itemsmodel->getComment($item['id']);
                        if($data['comment'][$index] != ""){
                            $temp = 0;
                            $sum = 0;
                            foreach($data['comment'][$index] as $index =>$comment) {
                                $sum = $sum + $comment['star_rating'];
                                $temp ++;
                            }
                            $avg = $sum/ $temp;
                            $data['avg'][$item['id']] = $avg;
                        }
                    }
                }
            }
            if(isset($data)){
                $this->view('/cart/index',$data);
            }else {
                $data['item'] = 0;
                $data['user'] = 0;
                $this->view('/cart/index', $data);
                // var_dump($data['item']);
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
                    $check=$this->cartmodel->orderDetail($result, $item['id'], $item['amount'], isset($item['discount'])? $item['discount'] : $item['price']);
                    $delete = $this->cartmodel->deleteInCart($data);
                }
                header("Location: " . DOCUMENT_ROOT . "/cart");
            }
        }
    }

?>