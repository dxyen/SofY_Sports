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
        function getAllNumber(){
            $sql = "SELECT COUNT(*) FROM SPORT_TYPE";

            $result = $this->db->query($sql);

            if ($result->num_rows > 0) {
            return $result->fetch_row()[0];
            } else {
            return false;
            }
            return true;
        }
        function getSameKind($idType, $idItem){
            // $idType = $data['id_sport_type'];
            // var_dump($idType, $idItem);
            $stmt = $this->db->prepare("SELECT * FROM ITEMS WHERE id_sport_type = ? and id !=? ");
            $stmt->bind_param("ii", $idType, $idItem);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows >0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
    }
?>