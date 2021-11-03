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
            $stmt = $this->db->prepare("CALL getUserItemByIdOrder()");

            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
    }
?>