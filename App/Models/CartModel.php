<?php

use App\Core\Database;

class CartModel extends Database {

        function getItemInCartByUser($iduser){
            $stmt = $this->db->prepare("CALL getItemInCartByUser(?)");
            $stmt->bind_param("i", $iduser);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }

        function addToCart($data){

            $userId = $data['userId'];
            $itemId = $data['itemId'];
            $amount = 1;

            $amountInCart = $this->checkItemInCart($userId, $itemId);

            $isSuccess = true;
            $error = "";
            
            if ($amountInCart > 0) {
            $amount += $amountInCart;
            $stmt = $this->db->prepare("UPDATE CART SET amount = ? WHERE id_user = ? AND id_item = ?");
            $stmt->bind_param("iii", $amount, $userId, $itemId);
            $stmt->execute();
            if ($stmt->error) {
                $isSuccess = false;
                $error = $stmt->error;
            }
            } else {
                $stmt = $this->db->prepare("INSERT INTO CART(id_item, id_user, amount) VALUES (?, ?, ?)");
                $stmt->bind_param("iii", $itemId, $userId, $amount);

                $stmt->execute();
                if ($stmt->error) {
                    $isSuccess = false;
                    $error = $stmt->error;
                }
            }
            $numInCart = $this->amountInCart($userId);
            return [
            'isSuccess' => $isSuccess,
            'numInCart' => $numInCart,
            'error' => $error];
        }

        function changeAmount($data){
            $userId = $data['idUser'];
            $itemId = $data['idItem'];
            $amount =  $data['amount'];
            $isSuccess = true;

            $stmt = $this->db->prepare("UPDATE CART SET amount = ? WHERE id_user = ? AND id_item = ?");
            $stmt->bind_param("iii", $amount, $userId, $itemId);
            $stmt->execute();
            if ($stmt->error) {
                $isSuccess = false;
            }

            $numInCart = $this->amountInCart($userId, $itemId);
            return [
                'isSuccess' => $isSuccess,
                'numInCart' => $numInCart];
        }

        function checkItemInCart($userId, $itemId){
            $stmt = $this->db->prepare("SELECT * FROM CART WHERE id_user = ? AND id_item = ?");
            $stmt->bind_param("ii", $userId, $itemId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
            $cart = $result->fetch_assoc();
            return $cart['amount'];
            }
            return 0;
        }
    
        function amountInCart($userId){
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM CART WHERE id_user = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_row()[0];
        }
        function amountInCartItem($userId, $itemId){
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM CART WHERE id_user = ? and id_item = ?");
            $stmt->bind_param("ii", $userId, $itemId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_row()[0];
        }

        function deleteInCart($data){
            $userId = $data['userId'];
            $itemId = $data['itemId'];
            $stmt = $this->db->prepare("DELETE FROM CART WHERE id_user = ? AND id_item = ?");
            $stmt->bind_param("ii", $userId, $itemId);
    
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
            return true;
            }
            return false;
        }

        function order($data){
        if (isset($data)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $orderdate = date("d-m-Y G:i:s");
            $userID = $data['name'];
            $address = $data['address'];

            $stmt = $this->db->prepare("CALL itemsBookByUser(?, ?, ?)");
            $stmt->bind_param("iss", $userID, $address, $orderdate);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }
        return false;
    }

    function orderDetail($idOrder, $idItem, $amount){
        $idOrder = $idOrder['id_max'];
        // var_dump($idOrder, $idItem, $amount);
        $stmt = $this->db->prepare("insert into order_details(id_order, id_item, amount) value(?, ?, ?)");
       
        $stmt->bind_param("iii", $idOrder, $idItem, $amount);
        $stmt->execute();
        // var_dump($stmt);
        $result = $stmt->affected_rows;

        if ($result < 1) {
            return false;
        } else {
            return true;
        }
    }
    }
?>