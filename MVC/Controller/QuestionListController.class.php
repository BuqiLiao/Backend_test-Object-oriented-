<?php

final class QuestionListController extends BaseController{

    private $QuestionList_obj;

    public function __construct(){

        $this->QuestionList_obj = FactoryModel::GetInstance("QuestionListModel");
        return $this->QuestionList_obj;
    }

    public function delete(){
        if(isset($_GET['qid'])){

            $qid = $_GET['qid'];

        }elseif(is_array($_POST['qid'])){

            $qid = $_POST['qid'];
        }

        if($this->QuestionList_obj->Delete($qid)){
                    
            $this->jump("delete <i>{$qid}</i> successfully!","?c=QuestionList"); 
        }else{

            $this->jump("delete <i>{$qid}</i> unsuccessfully!","?c=QuestionList");
        }
    }
    public function add(){

        include VIEW_PATH."Add.php";
    }
    public function insert(){

        if(isset($_POST["submit"]) && $_POST["submit"] == "submit"){

            $data['title'] = trim($_POST["title"]);
            $data['content']= trim($_POST["content"]);
            $data['keywords'] = $_POST["keywords"];
            $data['date'] = time();

            if($this->QuestionList_obj->Insert($data)){
                    
                $this->jump("add <i>{$data['title']}</i> successfully!","?c=QuestionList");
            }else{

                $this->jump("add <i>{$data['title']}</i> unsuccessfully!","?c=QuestionList");
            }
        }
        
    }

    public function index(){
            
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagesize = 3;

        $records = $this->QuestionList_obj->Count();
        $total = $this->QuestionList_obj->TotalPage($pagesize);
        if ($page <= 1) {
            $page = 1;
        }
        if ($page >= $total) {
            $page = $total;
        }
        $arrs = $this->QuestionList_obj->FetchAll($page);

        include VIEW_PATH."index.php";
    }
}


// $ac = isset($_GET['ac']) ? $_GET['ac'] : 'index';
// $Controller_obj = new QuestionListController();
// $Controller_obj->$ac();

?>