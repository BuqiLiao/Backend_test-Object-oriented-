<?php


abstract class BaseModel{
    protected $conn_Db = null;

    public function __construct(){
        $db = [
            'DB_HOST' => 'localhost',
            'DB_USER' => 'root',
            'DB_PWD' => 'g1039384t',
            'DB_NAME' => 'tippo',
            'DB_CHARSET' => 'utf8'
        ];
        $this->conn_Db= Database::GetInstance($db);

    }
    public function Count(){
    }
    public function TotalPage($pagesize){
    }
    public function FetchAll($page){
    }  
    public function Delete($u){  
    }
}

?>
