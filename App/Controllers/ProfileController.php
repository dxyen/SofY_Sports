<?php
    use App\Core\Controller;

    class ProfileController extends Controller {

        private $profilemodel;

        function __construct()
        {
            $this->profilemodel = $this->model("ProfileModel");
        }
        function Index(){
            // var_dump ($_SESSION['user']);
            // $data = [];
            if(isset($_SESSION['user'])){
                $id = $_SESSION['user']['id'];
                $data['user'] = $this->profilemodel->getById($id);
                $orders = $this->profilemodel->getOrderById($id);
                $data['order'] = $orders;
                if($orders != false) {
                    foreach($orders as $index => $order) {
                        // var_dump($order['id']);
                        $data[$order['id']]['orderDetails'] = $this->profilemodel->getItemUserByIdOrder($order['id']);
                        $total = $data[$order['id']]['orderDetails'];
                        $sum = 0;
                        foreach($total as $index => $tt) {
                            if(isset($tt['disco'])){
                                $sum = $sum + $tt['disco'] *$tt['amount'];
                            }else {
                                $sum = $sum + $tt['price'] *$tt['amount'];
                            }
                            $data[$order['id']]['total'] = $sum;
                        }
                    }
                    // echo '<pre>';
                    // print_r ($data['order']);
                    // echo '</pre>';
                    // var_dump( );
                } else {
                    $data['message'] = "Bạn không có lịch sử mua hàng nào!";
                }
                $data['orderDetail'] = $this->profilemodel->getItemUserByIdOrder($orders);
                // var_dump($data['order']);
                $_SESSION['user']['avatar'] = $data['user']['avatar'];
                // var_dump($_SESSION['user']['avatar']);
            }
            $this->view('/profile/index', $data);
        }
        function update($id){

            $data = $_POST;
            $user = $this->profilemodel->getById($id);
            // var_dump($_POST);
            $data['fullname'] = $_POST['fullname'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];
            $data['address'] = $_POST['address'];
            $data['address2'] = $_POST['address2'];
            $data["id"] = $id;
            
            if (isset($_FILES["image"]['name'])) {

                if($_FILES["image"]['name'] !=""){
                    $randomNum = time();
                    $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                    $imageExt = substr($imageName, strrpos($imageName, '.'));
                    $imageExt = str_replace('.', '', $imageExt);
                    $newImageName = $randomNum . '.' . $imageExt;

                    move_uploaded_file($_FILES["image"]["tmp_name"], USER_IMAGES . DS . $newImageName);
                    $data["image"] = $newImageName;
                    unlink(USER_IMAGES . DS . $user['avatar']);
                }else {
                    $data['image'] = $user['avatar'];
                }
            }
            // var_dump($data);
            // die();
            $result = $this->profilemodel->update($data);
            if ($result == true) {
                $_SESSION['alert']['success'] = true;
                $_SESSION['alert']['messages'] = "Đã cập nhật thành công!";
              }else {
                $_SESSION['alert']['success'] = false;
                $_SESSION['alert']['messages'] = $result;
              }
            header("Location: " . DOCUMENT_ROOT . "/profile");
        }
    }

?>