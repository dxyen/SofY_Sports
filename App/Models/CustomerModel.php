<?php
    use App\Core\Database;

    class CustomerModel extends Database {
        function all(){
            $stmt = $this->db->prepare("SELECT * FROM USERS WHERE role = 1");
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