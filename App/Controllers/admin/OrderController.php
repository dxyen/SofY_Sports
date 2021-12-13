<?php
    use App\Core\Controller;

    class OrderController extends Controller {

        private $ordermodel;

        function __construct()
        {
            $this->ordermodel = $this->model("OrderModel");
        }
        function Index(){
            $totals = $this->ordermodel->getDetail();

            $orders = $this->ordermodel->allOrder();
            $data['order'] = $orders;
            $data['totals'] = [];

            foreach($orders as $key => $order) {
                $data['totals'][$key] = 0;
                foreach($totals as $index => $total) {
                    $sum = $data['totals'][$key];
                    if($total['id_order'] == $order['id'])
                    {
                        $sum = $data['totals'][$key] + $total['amount'] * $total['price_item'];
                        $data['totals'][$key] = $sum;
                    }
                }
            }
            // var_dump($data);
            $this->view('/admin/orders/index', $data);
        }
        function edit($id){
            $status = $this->ordermodel->getStatus();
            $ordersById=$this->ordermodel->getItemByIdOrder($id);
            $order = $this->ordermodel->getOrderById($id);
            $amuontOrder = $this->ordermodel->getAmountItemOrder($id);
            if(!$ordersById){
                header("Location: " . DOCUMENT_ROOT . "/admin/order");
            }
            $data['total'] = 0;
            foreach($ordersById as $index => $total) {
                $data['total'] = $data['total'] + $total['amount'] * $total['price'];
            }
            $data['ordersById'] = $ordersById;
            $data['status'] = $status;
            $data['order'] = $order;
            $data['amuontOrder'] = $amuontOrder;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $this->view('/admin/orders/edit', $data);
        }

        function update($id){
            if (!isset($_POST)) {
                header("Location: " . DOCUMENT_ROOT . "/admin/order");
            } else {
                var_dump($_POST);
                $data = $_POST;

                // $data['orderDate'] = $_POST['orderDate'];
                $data['deliverydate'] = $_POST['deliverydate'];
                $data['status'] = $_POST['status'];
                // $data['idname'] = $_POST['idname'];
                // $data['address'] = $_POST['address'];
                $data["id"] = $id;

                $result = $this->ordermodel->update($data);
                if ($result == true) {
                    $_SESSION['alert']['success'] = true;
                    $_SESSION['alert']['messages'] = "Đã cập nhật thành công!";
                  }else {
                    $_SESSION['alert']['success'] = false;
                    $_SESSION['alert']['messages'] = $result;
                  }
                if ($result) {
                header("Location: " . DOCUMENT_ROOT . "/admin/order");
                } else {
                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
                }
            }
        }
        function delete($id){
            if(!$id){
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $result = $this->ordermodel->delete($id);
                // var_dump($result);
                if ($result) {
                    header("Location: " . DOCUMENT_ROOT . "/admin/order");
                } else {
                    if (isset($_SERVER["HTTP_REFERER"])) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }
    }

?>