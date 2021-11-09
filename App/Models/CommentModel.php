<?php

    use App\Core\Database;

    class CommentModel extends Database{
        //Phần admin
        function getAllComment(){
            $stmt = $this->db->prepare("SELECT C.id as id, C.`comment` as comment, U.fullname as fullname, C.id_user as idUser, T.`name` as name, C.id_item as idItem from comment C join users U on C.id_user = U.id join items T on C.id_item = T.id");
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function getByNameAdmin($name){
            $stmt = $this->db->prepare("SELECT id, name, phone, address, email, avatar FROM USERS WHERE name = ?");
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
            return $result->fetch_assoc();
            } else {
            return false;
            }
        }
        function delete($id){
            $stmt = $this->db->prepare("DELETE FROM COMMENT WHERE id = $id");
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