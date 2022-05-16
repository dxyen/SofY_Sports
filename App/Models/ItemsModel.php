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
                $sql = "SELECT ITEMS.id, ITEMS.image, ITEMS.`name`, ITEMS.price, DISCOUNTS.discount, DISCOUNTS.date_start, DISCOUNTS.date_end FROM ITEMS LEFT JOIN DISCOUNTS ON DISCOUNTS.id_item = ITEMS.id ORDER BY ITEMS.ID ASC LIMIT $limit OFFSET $index";

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
        function getItemsPromotion(){
            $stmt = $this->db->prepare("SELECT * FROM DISCOUNTS JOIN ITEMS WHERE DISCOUNTS.id_item = ITEMS.id");

            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getByItems($id){
            $id = intval($id);
            $stmt = $this->db->prepare("SELECT ITEMS.id, ITEMS.description, ITEMS.image, ITEMS.`name`, ITEMS.price, DISCOUNTS.discount, DISCOUNTS.date_start, DISCOUNTS.date_end, ITEMS.id_sport_type FROM ITEMS LEFT JOIN DISCOUNTS ON ITEMS.id = DISCOUNTS.id_item WHERE ITEMS.id = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_assoc();
            }else{
                return false;
            }
        }

        function getById($id){
            $stmt = $this->db->prepare("SELECT * FROM ITEMS WHERE id = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_assoc();
            }else{
                return false;
            }
        }

        function getByKeyword($keyword){
            $keyword = '%' . $keyword . '%';
            $stmt = $this->db->prepare("SELECT ITEMS.id, ITEMS.image, ITEMS.`name`, ITEMS.price, DISCOUNTS.discount, DISCOUNTS.date_start, DISCOUNTS.date_end FROM ITEMS LEFT JOIN DISCOUNTS ON DISCOUNTS.id_item = ITEMS.id WHERE name like ?");
            $stmt->bind_param("s", $keyword);

            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }

        function comment($id, $data){
            // var_dump($data);
            $date_comment = date('Y-m-d H:i:s');
            $idItem = $data['idItemComment'];
            $comment = $data['comment'];
            $star = $data['rank'];
            $stmt = $this->db->prepare("INSERT INTO COMMENT(id_user, id_item, comment, star_rating, date_comment) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iisss", $id, $idItem, $comment, $star, $date_comment);

            $stmt->execute();
            if ($stmt->error) {
                $error = $stmt->error;
            }
            return true;
        }
        function getComment($idItems){
            $idItems = intval($idItems);
            $stmt = $this->db->prepare("SELECT COMMENT.comment, COMMENT.star_rating, COMMENT.date_comment, USERS.fullname, USERS.avatar FROM COMMENT JOIN USERS ON COMMENT.id_user = USERS.id WHERE id_item = ?");
            $stmt->bind_param("i", $idItems);

            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }

        //admin
        function allItem(){
            $sql = 'SELECT * FROM ITEMS';
            $result = $this->db->query($sql);
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function store($data){
            $name = $data['name'];
            $categoryId = $data['categoryId'];
            $price = $data['price'];
            $description = $data['description'];
            $imageName = $data['image'];

            $stmt = $this->db->prepare("INSERT INTO ITEMS(name, id_sport_type, price, description, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("siiss", $name, $categoryId, $price, $description, $imageName);

            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function delete($id){
            $stmt = $this->db->prepare("DELETE FROM ITEMS WHERE id = ?");
            $stmt->bind_param("i", $id);
            $isSuccess = $stmt->execute();
            if(!$isSuccess){
                return $stmt->error;
            } else if($stmt->affected_rows <= 0){
                return "không thể xóa";
            }
        }
        function update($data){
            $name = $data['name'];
            $categoryId = $data['categoryId'];
            $price = $data['price'];
            $description = $data['description'];
            $imageName = $data['image'];
            $id = $data['id'];

            $stmt = $this->db->prepare("UPDATE ITEMS set name = ?, id_sport_type = ?, price = ?, description = ?, image = ? WHERE id = ?");
            $stmt->bind_param("siissi", $name, $categoryId, $price, $description, $imageName, $id);
        
            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function getAllNumber(){
            $sql = "SELECT COUNT(*) FROM ITEMS";

            $result = $this->db->query($sql);

            if ($result->num_rows > 0) {
            return $result->fetch_row()[0];
            } else {
            return false;
            }
            return true;
        }
        function allItemDiscount(){
            $sql = 'SELECT discounts.id_item, discounts.id, discounts.discount, items.`name`, items.price, items.image, discounts.date_start, discounts.date_end FROM discounts JOIN items where discounts.id_item =  items.id';
            $result = $this->db->query($sql);
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function deleteDiscount($id){
            // $id_item = $id;
            // var_dump($id_item);
            $stmt = $this->db->prepare("DELETE FROM DISCOUNTS WHERE id = ?");
            $stmt->bind_param("i", $id);
            $isSuccess = $stmt->execute();
            if(!$isSuccess){
                return $stmt->error;
            } else if($stmt->affected_rows <= 0){
                return "không thể xóa";
            }
        }
        function storeDiscount($data){
            // var_dump($data['items']['price']);
            if (isset($data['discountIdPercent'])) {
                $discountIdPercent  = $data['discountIdPercent'];
                $price_discount = $data['items']['price'] - ($data['items']['price'])*$discountIdPercent;
            } else{
                $price_discount = $data['price_discount'];
            }
            $id_item = $data['itemId'];
            $date_start = $data['date_start'];
            $date_end = $data['date_end'];
            // var_dump($discountIdPercent);
            $stmt = $this->db->prepare("INSERT INTO DISCOUNTS(discount, id_item, date_start, date_end) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $price_discount, $id_item, $date_start, $date_end);

            $stmt->execute();
            $result = $stmt->affected_rows;
            // var_dump($result);
            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
        function getAllNumberDiscount(){
            $sql = "SELECT COUNT(*) FROM DISCOUNTS";

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