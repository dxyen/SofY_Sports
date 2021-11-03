<?php
    use App\Core\Controller;

    class CustomerController extends Controller {

        private $customermodel;

        function __construct()
        {
            $this->customermodel = $this->model("CustomerModel");
        }
        function Index(){
            $data['customer'] = $this->customermodel->all();
            $this->view('/admin/customers/index', $data);
        }
    }

?>