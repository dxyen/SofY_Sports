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
    }
?>