<?php

class Database{

    private static $obj = null;//Set private static inner object

    private $DB_HOST;//Host-name
    private $DB_USER;//Username
    private $DB_PWD;//Password
    private $DB_NAME;//Database-name 
    private $DB_CHARSET;//Charset

    private $conn;//Connection
    //Prevent object from getting instantiated outside
    private function __construct($config=[]){

        $this->DB_HOST = $config['DB_HOST'];
        $this->DB_USER = $config['DB_USER'];
        $this->DB_PWD = $config['DB_PWD'];
        $this->DB_NAME = $config['DB_NAME'];
        $this->DB_CHARSET = $config['DB_CHARSET'];

        $this->ConnectDb();//Connect and select database
        $this->SetCharset();//Set Charset
    }
    //Prevent object from cloning outside
    private function __clone(){}
    //Outside function to built up the inner object
    public static function GetInstance($config=[]){
        //Determine whether the inner object has been instantiated
        if(!self::$obj instanceof self){
            //If not instantiate the inner object
            self::$obj = new self($config);
        }
        //Return the inner object to outer object
        return self::$obj;
    }
/***********************Define ConnectDb() and SetCharset()*************************/
    private function ConnectDb(){

        if(!$this->conn = @mysqli_connect($this->DB_HOST,$this->DB_USER,$this->DB_PWD,$this->DB_NAME)){

            echo mysqli_error(Database::$conn);
            exit;
        }
    }
    private function SetCharset(){

        mysqli_set_charset($this->conn,$this->DB_CHARSET);

    }
/**********Define functions for executing SQL statements***********/
    public function Execute($sql){
        $sql = strtolower($sql);
        return mysqli_query($this->conn,$sql);
    }
    private function InsertTb($sql){

        $sql = strtolower($sql);

        if(substr($sql,0,6)=="insert"){

            return mysqli_query($this->conn,$sql);
        }
    }
    private function DeleteTb($sql){

        $sql = strtolower($sql);

        if(substr($sql,0,6)=="delete"){

            return mysqli_query($this->conn,$sql);
        }
    }
    private function UpdateTb($sql){

        $sql = strtolower($sql);

        if(substr($sql,0,6)=="update"){
        
            return mysqli_query($this->conn,$sql);
        }
    }
    private function SelectTb($sql){

        $sql = strtolower($sql);

        if(substr($sql,0,6)=="select"){
                    
            return mysqli_query($this->conn,$sql);
        }
    }
/**************Define functions for fetching results****************/
    public function FetchOne($sql,$type){

        $result = $this->InsertTb($sql);
        $result = $this->DeleteTb($sql);
        $result = $this->UpdateTb($sql);
        $result = $this->SelectTb($sql);

        $types = [
            1 => MYSQLI_NUM,
            2 => MYSQLI_BOTH,
            3 => MYSQLI_ASSOC,
        ];

        return mysqli_fetch_array($result,$types[$type]);
    }
    public function FetchAll($sql,$type){

        $result = $this->InsertTb($sql);
        $result = $this->DeleteTb($sql);
        $result = $this->UpdateTb($sql);
        $result = $this->SelectTb($sql);

        $types = [
            1 => MYSQLI_NUM,
            2 => MYSQLI_BOTH,
            3 => MYSQLI_ASSOC,
        ];

        return mysqli_fetch_all($result,$types[$type]);
    }
    public function CountRow($sql){

        $result = $this->InsertTb($sql);
        $result = $this->DeleteTb($sql);
        $result = $this->UpdateTb($sql);
        $result = $this->SelectTb($sql);

        return mysqli_num_rows($result);
    }
    public function AffectedRow($sql){

        $this->InsertTb($sql);
        $this->DeleteTb($sql);
        $this->UpdateTb($sql);
        $this->SelectTb($sql);

        return mysqli_affected_rows($this->conn);
    }
/***********************************************************/

    //Close database
    public function __destruct()
    {
        mysqli_close($this->conn);
    }


}



?>