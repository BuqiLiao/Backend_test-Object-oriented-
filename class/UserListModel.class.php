<?php

class UserListModel extends BaseModel{

    private $pagesize;
    private $records;

    public function Count() {

        $sql = "Select * from user";
        $this->records = $this->conn_Db->CountRow($sql);
        return $this->records;
    }
    public function TotalPage($pagesize){
        $this->pagesize = $pagesize;
        $total= ceil($this->records / $this->pagesize);
        return $total;
    }  
    public function FetchOne($username){
        $sql = "select * from user where username = '$username'";
        return $this->conn_Db->FetchOne($sql,3);
    }
    public function FetchAll($page){
        $offset = ($page-1) * $this->pagesize;
        $sql = "select * from user order by id desc limit $offset,$this->pagesize";
        $arrs = $this->conn_Db->FetchAll($sql,3);
        return $arrs;
    }

    public function Delete($user){
        if (is_string($user)) {
        
            $username ="'" . $user . "'";
        
            $sql = "delete from user where username in($username)";
            $result = $this->conn_Db->AffectedRow($sql);
            return $result;

        }elseif(is_array($user)){
        
            $username_0 = join(',', $user);
            
            $username = "'". str_replace(",","','",$username_0 ) . "'";
        
            $sql = "delete from user where username in($username)";
            $result = $this->conn_Db->AffectedRow($sql);
            return $result;
        }
    }

    public function Insert($data){

        $fields = "";
        $values = "";
        foreach($data as $key=>$value){

            $fields .= "$key,";
            $values .= "'$value',";
        }
        $fields= rtrim($fields,",");
        $values= rtrim($values,",");

        $sql = "INSERT INTO user($fields) VALUES($values)";

        return $this->conn_Db->Execute($sql);
    }

    public function Update($data,$id){

        $str = '';
        foreach($data as $key=>$value){

            $str .= "{$key}='{$value}',";
        }
        $str = rtrim($str,',');

        $sql = "UPDATE user SET {$str} WHERE id={$id}";
        return $this->conn_Db->Execute($sql);
    }
}

?>
