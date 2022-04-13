<?php
    use App\Core\Controller;

    class ProductsController extends Controller {
        private $productsmodel;

        function __construct()
        {
            $this->productsmodel = $this->model('categorymodel');
            $this->itemsmodel = $this->model('itemsmodel');
        }
        function index(){
            
        }
        function categories(){
            if(isset($_GET['id'])){
                $idType = $_GET['id'];
            }

            $items = $this->productsmodel->getItemsByCategories($idType);
            $data['items'] = $items;
            // echo '<pre>';
            // print_r($data['items']);
            // echo '</pre>';

            // lay ra star cua san pham 
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
            
            $this->view("/products/index", $data);
        }
    }
?>