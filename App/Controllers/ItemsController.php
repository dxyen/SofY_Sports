<?php 
    use App\Core\Controller;

    class ItemsController extends Controller {
        private $itemsmodel;
        private $average;
        function __construct()
        {
            $this->itemsmodel = $this->model('itemsmodel');
            $this->productsmodel = $this->model('productsmodel');
        }
        function index(){
            if(isset($_GET['id'])){
                $idItems = $_GET['id'];
            }
            $data['items'] = $this->itemsmodel->getByItems($idItems);
            $data['comment'] = $this->itemsmodel->getComment($idItems);
            $data['samekind'] = $this->productsmodel->getSameKind($data['items']['id_sport_type'], $data['items']['id']);
            // echo '<pre>';
            // print_r($data['comment']['star_rating']);
            // echo '</pre>';
            // var_dump($data['comment']);
            if($data['comment'] != false){
                    $temp = 0;
                    $sum = 0;
                foreach($data['comment'] as $index =>$comment) {
                    // $comment[0]['star_rating'];
                    $sum = $sum + $comment['star_rating'];
                    $temp ++;
                }
                $avg = $sum/ $temp;
                $data['avg'] = $avg;
                // var_dump($avg);
            }
            
            $this->view("/items/index", $data);
        }
        function search(){
            $keyword = $_GET['keyword'];
            $items = $this->itemsmodel->getByKeyword($keyword);
            
            $data['keyword'] = $keyword;
            $data['items'] = $items;
            foreach($data['items'] as $index =>$item){
                $data['comment'][$index] = $this->itemsmodel->getComment($item['id']);
                if($data['comment'][$index] != ""){
                    $temp = 0;
                    $sum = 0;
                    foreach($data['comment'][$index] as $index =>$comment) {
                        $sum = $sum + $comment['star_rating'];
                        $temp ++;
                    }
                    $avg = $sum/ $temp;
                    $data['avg'][$item['id']] = $avg;
                }
            }
            // echo '<pre>';
            // print_r($data['avg']);
            // echo '</pre>';
            $this->view('/items/search', $data);
        }
        function comment(){
            $id = $_SESSION['user']['id'];
            if (isset($_POST)) {
                $data =$_POST;
                // var_dump($data);
                $result = $this->itemsmodel->comment($id, $data);
                if ($result) {
                    header("Location: " . DOCUMENT_ROOT . "/items/detail?id=".$_POST['idItemComment']."");
                }
            }
        }
    }
?>