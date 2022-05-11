<?php
    use App\Core\Controller;

    class HomeController extends Controller {

        private $itemsmodel;
        private $categorymodel;
        function __construct()
        {
            $this->itemsmodel = $this->model('itemsmodel');
            $this->categorymodel = $this->model('categorymodel');
            $this->bannermodel = $this->model('bannermodel');
        }
        function Index(){
            $page = 1;
            $limit = 12;
            $totalPage = 1;
            $totalPage = $this->itemsmodel->totalPage($limit);

            if (isset($_GET['page']) && $_GET['page'] > 0) {
                $page = $_GET['page'];
                if ($_GET['page'] > $totalPage) {
                  $page = $totalPage;
                }
              }
            if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
            }

            $items = $this->itemsmodel->all($page, $limit);

            $data['items'] = $items;
            // lay gia khuyen mai theo quy dinh thoi gian
            $data['date_time'] = date('Y-m-d');
            // foreach($data['items'] as $index =>$item){
            //     if ($date_time < $item['date_start']) {
            //         $data['items']['discount'] = "";
            //     }
            // }
            $data['page'] = $page;
            $data['totalPage'] = $totalPage;

            $itemspromotion =$this->itemsmodel->getItemsPromotion();
            // Lấy items để show promotion
            $data['promotion1'] = $itemspromotion;
            $data['promotion'] = [];
            foreach($data['promotion1'] as $index =>$promotion){
                if ($data['date_time'] >= $promotion['date_start']) {
                    // print_r("hello");
                    $data['promotion'][$index] = $promotion;
                }
            }
            $data['categories'] = $this->categorymodel->all();
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
            $banner = $this->bannermodel->all();
            $data['banner'] = $banner;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $this->view("/home/index", $data);
        }
    }
?>