<?php
    use App\Core\Controller;

    class HomeController extends Controller {

        private $itemModel;
        // private $categorymodel;
        function __construct()
        {
            $this->itemModel = $this->model('itemsmodel');
            // $this->categorymodel = $this->model('categorymodel');
        }
        function Index(){
            $items = $this->itemModel->all();
            if(! $items){
                $items=[];
            }
            $data['items'] = $items;
            $this->view("/home/index", $data);
        }
    }
?>