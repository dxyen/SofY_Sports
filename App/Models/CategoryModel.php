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

        function getItemsByCategories($typeId){
            $stmt = $this->db->prepare("SELECT ITEMS.id, ITEMS.image, ITEMS.`name`, ITEMS.price, DISCOUNTS.discount, DISCOUNTS.date_start, DISCOUNTS.date_end FROM ITEMS LEFT JOIN DISCOUNTS ON DISCOUNTS.id_item = ITEMS.id WHERE id_sport_type = ?");
            $stmt->bind_param("i", $typeId);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getById($id){
            $stmt = $this->db->prepare("SELECT * FROM SPORT_TYPE WHERE id = ?");
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
            $name = $data['name'];
            $description = $data['description'];
            $imageName = $data['image'];
            $id = $data['id'];

            $stmt = $this->db->prepare("UPDATE SPORT_TYPE set name = ?, description = ?, image = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $description, $imageName, $id);
        
            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function store($data){
            $name = $data['name'];
            $description = $data['description'];
            $imageName = $data['image'];

            $stmt = $this->db->prepare("INSERT INTO SPORT_TYPE(name, description, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $description, $imageName);

            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function delete($id){
            $stmt = $this->db->prepare("DELETE FROM SPORT_TYPE WHERE id = $id");
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