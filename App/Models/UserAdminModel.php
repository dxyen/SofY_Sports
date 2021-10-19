<?php

    use App\Core\Database;

    class UserAdminModel extends Database{
        //Phần admin
        function authenticateAdmin($data){
            $name = $data['name'];
            $password = $data['password'];
            $stmt = $this->db->prepare("SELECT * FROM USERS WHERE name = ? and role = 0");
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $passwordHashed = $result->fetch_assoc()['password'];
                $isValidPassword = password_verify($password, $passwordHashed);
                if ($isValidPassword == true) {
                    return true;
                } else {
                    return "Mật khẩu không chính xác";
                }
            } else {
                return "Không tồn tại tên: " . $name;
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
    }
?>