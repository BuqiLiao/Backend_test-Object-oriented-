<?php

final class UserListController extends BaseController{
    //Private Object of UserListModel Class
    private $UserList_obj;

    public function __construct(){
        //Use FactoryModel Class to instantiate UserListModel Class to Object
        $this->UserList_obj = FactoryModel::GetInstance("UserListModel");
        return $this->UserList_obj;
    }
    /*************************Showing Table**************************** */
    //When ?a=index or ?, call index()
    public function index(){
            
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagesize = 3;

        $records = $this->UserList_obj->Count();
        $total = $this->UserList_obj->TotalPage($pagesize);
        if ($page <= 1) {
            $page = 1;
        }
        if ($page >= $total) {
            $page = $total;
        }
        $arrs = $this->UserList_obj->FetchAll($page);

        include VIEW_PATH."index.php";
    }
    /*************************Delete Function**************************** */
    //When ?a=delete, call delete()
    public function delete(){
        if(isset($_GET['username'])){

            $username = $_GET['username'];

        }elseif(is_array($_POST['username'])){

            $username = $_POST['username'];
        }

        if($this->UserList_obj->Delete($username)){

            $this->jump("delete <i>{$username}</i> successfully!","?c=UserList");
        }else{

            $this->jump("delete <i>{$username}</i> unsuccessfully!","?c=UserList");
        }
    }
    /*************************Edit Function**************************** */
    //When ?a=edit, call edit()
    public function edit(){
        $data['id'] = trim($_GET["id"]);
        $data['username'] = trim($_GET["username"]);
        $data['email'] = trim($_GET["email"]);

        $arr = $this->UserList_obj->FetchOne($data['username']);

        include VIEW_PATH."Edit.php";
    }
    //When ?a=update, call update()
    public function update(){
        $id = $_POST["id"];
        $data_t['old_username'] = trim($_POST["old_Username"]);
        $data_t['old_password'] = $_POST["old_Password"];

        $arr = $this->UserList_obj->FetchOne($data_t['old_username']);

        if($data_t['old_password'] == $arr['password']){

            !empty(trim($_POST["new_Username"])) ? $data['username'] = trim($_POST["new_Username"]) : $data['username'] = $data_t['old_username'];
            !empty(trim($_POST["new_Email"])) ? $data['email'] = trim($_POST["new_Email"]) : $data['email'] = trim($_POST["old_Email"]);
            !empty(trim($_POST["new_Password"])) ? $data['password'] = $_POST["new_Password"] : $data['password'] = $data_t['old_password'];

            if($this->UserList_obj->Update($data,$id)){

                $this->jump("edit <i>{$id}</i> successfully!","?c=UserList");
            }else{

                $this->jump("edit <i>{$id}</i> unsuccessfully!","?c=UserList");
            }
        }else{

            $this->jump("Please input correct password!");
        }
    }
    /*************************Adding Function**************************** */
    //When ?a=add, call add()
    public function add(){

        include VIEW_PATH."Add.php";
    }
    //When ?a=insert, call insert()
    public function insert(){

        if(isset($_POST["submit"]) && $_POST["submit"] == "submit"){

            $data['username'] = trim($_POST["Username"]);
            $data['email'] = trim($_POST["Email"]);
            $data['password'] = $_POST["Password"];
            $data['time'] = time();

            if($this->UserList_obj->Insert($data)){
                    
                $this->jump("add <i>{$data['username']}</i> successfully!","?c=UserList");
            }else{
    
                $this->jump("add <i>{$data['username']}</i> unsuccessfully!","?c=UserList");
            }
        }
        
    }
    
}


// $ac = isset($_GET['ac']) ? $_GET['ac'] : 'index';
// $Controller_obj = new UserListController();
// $Controller_obj->$ac();

?>