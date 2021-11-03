<?php
    use App\Core\Database;

    class AdminModel extends Database {
        function all(){
            $stmt = $this->db->prepare("SELECT * FROM USERS WHERE role = 0");
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
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
            $name = $data['name'];
            $fullname = $data['fullname'];
            $phone = $data['phone'];
            $id = $data['id'];

            $stmt = $this->db->prepare("UPDATE USERS set name = ?, fullname = ?, phone = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $fullname, $phone, $id);
        
            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result < 1) {
            return false;
            } else {
            return true;
            }
        }
    }
?>