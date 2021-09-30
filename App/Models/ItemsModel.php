<?php

use App\Core\Database;

class itemsmodel extends Database {
        function all($page = 0, $limit = 12){
            if($page === 0) {
                $sql = "SELECT * FROM ITEMS";
                $result = $this->db->query($sql);
                if($result->num_rows >0){
                    return $result->fetch_all(MYSQLI_ASSOC);
                }else{
                    return false;
                }
            } else{
                $index = ($page-1) *$limit;
                $sql = "SELECT *FROM ITEMS ORDER BY ID ASC LIMIT $limit OFFSET $index";

                $result = $this->db->query($sql);
                if($result->num_rows >0){
                    return $result->fetch_all(MYSQLI_ASSOC);
                }else{
                    return false;
                }
            }
            
        }
        function totalPage($limit){
            $sql = "SELECT *FROM ITEMS";
                $result = $this->db->query($sql);
                $totalItems = $result->num_rows;

                $totalPage = ceil($totalItems / $limit);
                return $totalPage;
        }


    }
?>