<?php

use App\Core\Database;

class BannerModel extends Database {

        function all(){
            $sql = 'SELECT * FROM BANNERS';
            $result = $this->db->query($sql);
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function store($data){
            $image = $data['image'];
            $name = $data['name'];
            $stmt = $this->db->prepare("INSERT INTO BANNERS(name, image) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $image);

            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function delete($id){

            $stmt = $this->db->prepare("DELETE FROM BANNERS WHERE id = ?");
            $stmt->bind_param("i", $id);
            $isSuccess = $stmt->execute();
            if(!$isSuccess){
                return $stmt->error;
            } else if($stmt->affected_rows <= 0){
                return "không thể xóa";
            }
        }
    }
?>