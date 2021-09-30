<?php

use App\Core\Database;

class categorymodel extends Database {
        function all(){
            $sql = 'SELECT * FROM SPORT_TYPE';
            $result = $this->db->query($sql);
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }

    }
?>