<?php
    use App\Core\Database;

    class productsmodel extends Database {
        function all($typeId){
            $stmt = $this->db->prepare("SELECT * FROM ITEMS WHERE id_sport_type = ?");
            $stmt->bind_param("i", $typeId);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        function allCategories(){
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