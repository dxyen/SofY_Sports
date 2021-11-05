<?php
    use App\Core\Database;

    class ordermodel extends Database {
        function getAllNumber(){
            $sql = "SELECT COUNT(*) FROM ORDERS WHERE id_status = 'CXL'";

            $result = $this->db->query($sql);

            if ($result->num_rows > 0) {
            return $result->fetch_row()[0];
            } else {
            return false;
            }
            return true;
        }
        // Part Admin
        function allOrder(){
            $stmt = $this->db->prepare("SELECT O.id as id, U.fullname as fullname, O.order_date as orderdate, O.delivery_date as deliverydate, T.`name` as `status` from orders O join users U on O.id_user = U.id join `status` T on O.id_status = T.id");
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getDetail(){
            $stmt = $this->db->prepare("SELECT * FROM ORDER_DETAILS ");
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getStatus(){
            $stmt = $this->db->prepare("SELECT * FROM STATUS");
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getItemByIdOrder($id){
            $stmt = $this->db->prepare("CALL getItemByIdOrder(?)");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getOrderById($id){
            $stmt = $this->db->prepare("SELECT O.id as id, U.id as idUser, U.fullname as fullname, O.address as address, O.order_date as orderdate, O.delivery_date as deliverydate, T.`name` as `status` from orders O join users U on O.id_user = U.id join `status` T on O.id_status = T.id WHERE O.id =?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_assoc();
            }else{
                return false;
            }
        }
        function getAmountItemOrder($id){
            $stmt = $this->db->prepare("SELECT COUNT(*) as amount FROM ORDER_DETAILS WHERE id_order = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_assoc();
            }else{
                return false;
            }
        }

        function update($data){
            // $orderDate = $data['orderDate'];
            $deliverydate = $data['deliverydate'];
            $status = $data['status'];
            // $idname = $data['idname'];
            // $address = $data['address'];
            $id = $data["id"];

            $stmt = $this->db->prepare("UPDATE ORDERS set delivery_date = ?, id_status = ? WHERE id = ?");
            $stmt->bind_param("ssi", $deliverydate, $status, $id);

            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function delete($id){
            // var_dump($id);
            $stmt = $this->db->prepare("DELETE FROM ORDERS WHERE id = $id");
            $stmt->bind_param("i", $id);
            $isSuccess = $stmt->execute();
            if(!$isSuccess){
                return $stmt->error;
            } else if($stmt->affected_rows < 0){
                return "không thể xóa";
            }
        }
    }
?>