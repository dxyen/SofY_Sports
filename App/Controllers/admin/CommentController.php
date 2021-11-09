<?php
    use App\Core\Controller;

    class CommentController extends Controller {

        private $commentmodel;

        function __construct()
        {
            $this->commentmodel = $this->model("CommentModel");
        }
        function Index(){
            $data['comment'] = $this->commentmodel->getAllComment();
            $this->view('/admin/comment/index',$data);
        }

        function delete($id){
            if(!isset($id)){
                header("Location: " . DOCUMENT_ROOT . "/admin");
            } else {
                $result = $this->commentmodel->delete($id);
                if ($result) {
                    header("Location: " . DOCUMENT_ROOT . "/admin/comment");
                } else {
                    if (isset($_SERVER["HTTP_REFERER"])) {
                        header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }
    }

?>