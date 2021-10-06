<?php

    use App\Core\Database;

    class UserModel extends Database{

        function register($data){
            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            $address = $data['address'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $role = 1;
            $stmt = $this->db->prepare("INSERT INTO USERS(name, phone, address, password, email, role) values(?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $name, $phone, $address, $password, $email, $role);

            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result <1) {
                return false;
            }
            else {
                return true;
            }
        }

        function authenticate($data){
            $name = $data['name'];
            $password = $data['password'];
            $stmt = $this->db->prepare("SELECT * FROM USERS WHERE name = ?");
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
        function getByName($name){
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