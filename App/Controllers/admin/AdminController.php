<?php
    use App\Core\Controller;

    class AdminController extends Controller {

        private $adminmodel;

        function __construct()
        {
            $this->adminmodel = $this->model("AdminModel");
        }
        function Index(){
            $this->view('/admin/admins/index');
        }
    }

?>