<?php

require_once "../Connection.php";

//Set maximum number of users per page
$pagesize = 3;
$ac = isset($_GET['ac']) ? $_GET['ac'] : '';
$UserList_obj = new QuestionListModel($conn_Db,$pagesize);

if($ac == 'delete'){

    if(isset($_GET['qid'])){

        $qid = $_GET['qid'];

    }elseif(is_array($_POST['qid'])){

        $qid = $_POST['qid'];

    }

    if($UserList_obj->Delete($qid)){
                
        echo 'delete successfully!';
        header("refresh:2; url=?");    

    }else{

        echo 'delete unsuccessfully!';
        header("refresh:2; url=?");   

    }

}elseif($ac == "edit"){

}else{

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$records = $UserList_obj->Count();

$total = $UserList_obj->TotalPage();

$arrs = $UserList_obj->FetchAll($page);

include "./QuestionList.php";

}



?>