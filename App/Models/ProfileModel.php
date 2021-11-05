<?php

    use App\Core\Database;

    class ProfileModel extends Database{
        function getById($id){
            $stmt = $this->db->prepare("SELECT * FROM USERS WHERE id = ?");
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

            $stmt = $this->db->prepare("UPDATE USERS SET fullname =? , phone = ?, address = ?, address2 = ?, email = ?, avatar = ? WHERE id = ?");
            $stmt->bind_param("ssssssi", $data['fullname'], $data['phone'], $data['address'], $data['address2'], $data['email'], $data['image'], $data['id']);
            $result = $stmt->execute();

            if (!$result) {
                return $stmt->error;
            } else if ($stmt->affected_rows <= 0) {
                return "Khong co thay doi";
            }
            return true;
        }
        function getOrderById($id){
            // var_dump($id);
            $stmt = $this->db->prepare("SELECT O.id, O.order_date, O.delivery_date, O.id_user, O.id_status, O.address, ST.name FROM ORDERS O JOIN STATUS ST ON O.id_status = ST.id WHERE O.id_user = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }
        function getItemUserByIdOrder($data){
            $stmt = $this->db->prepare("CALL getItemUserByIdOrder(?)");
            $stmt->bind_param("i", $data);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }
    }
?>