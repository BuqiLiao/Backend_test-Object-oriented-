<?php


// include_once "./smarty-4.2.1/libs/Smarty.class.php";
require_once "../Connection.php";

// $smarty = new Smarty();

// $smarty->setTemplateDir("./App/Home");
// $arr = $smarty->getTemplateDir();

// $smarty->left_delimiter ="<{";
// $smarty->right_delimiter ="}>";

//Set maximum number of users per page
$pagesize = 3;
$ac = isset($_GET['ac']) ? $_GET['ac'] : '';
$UserList_obj = new UserListModel($conn_Db,$pagesize);

if($ac == 'delete'){

    if(isset($_GET['username'])){

        $username = $_GET['username'];

    }elseif(is_array($_POST['username'])){

        $username = $_POST['username'];

    }

    if($UserList_obj->Delete($username)){
                
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


// $sql_1 = "Select * from user";
// $records = $conn_Db->CountRow($sql_1);
// $total= ceil($records / $pagesize);

// $offset = ($page-1) * $pagesize;
// $sql_2 = "select * from user order by time desc limit $offset,$pagesize";
// $arrs = $conn_Db->FetchAll($sql_2,3);

include "./UserList.php";
// $smarty->display("./List.php");
}



?>