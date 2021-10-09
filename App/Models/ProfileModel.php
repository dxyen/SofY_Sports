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
            // var_dump($_FILES['avatar']);
            if($_FILES['avatar']['name'] != ""){
                $stmt = $this->db->prepare("UPDATE USERS SET fullname =? , phone = ?, address = ?, address2 = ?, email = ?, avatar = ? WHERE id = ?");
                $stmt->bind_param("ssssssi", $data['fullname'], $data['phone'], $data['address'], $data['address2'], $data['email'], $_FILES['avatar']['name'], $data['id']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], USER_IMAGES . DS . $_FILES['avatar']['name']);
            } else {
                $stmt = $this->db->prepare("UPDATE USERS SET fullname =? , phone = ?, address = ?, address2 = ?, email = ? WHERE id = ?");
                $stmt->bind_param("sssssi", $data['fullname'], $data['phone'], $data['address'], $data['address2'], $data['email'], $data['id']);
            }

            $result = $stmt->execute();

            if (!$result) {
            return $stmt->error;
            } else if ($stmt->affected_rows <= 0) {
            return "Không có sự thay đổi";
            }
            return true;
        }
    }
?>