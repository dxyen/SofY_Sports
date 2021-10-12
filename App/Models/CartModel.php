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
    }
?>