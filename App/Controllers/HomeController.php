<?php
    use App\Core\Controller;

    class HomeController extends Controller {

        private $itemsmodel;
        private $categorymodel;
        function __construct()
        {
            $this->itemsmodel = $this->model('itemsmodel');
            $this->categorymodel = $this->model('categorymodel');
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
            $data['page'] = $page;
            $data['totalPage'] = $totalPage;

            // // Lấy items để show promotion
            // $data['promotion'][] = $items[1];
            // $data['promotion'][] = $items[10];
            // $data['promotion'][] = $items[6];
            // $data['promotion'][] = $items[11];
            // $data['promotion'][] = $items[7];


            $data['categories'] = $this->categorymodel->all();
            $this->view("/home/index", $data);
        }
    }
?>