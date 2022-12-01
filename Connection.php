<?php

class Database{

    private $DB_HOST;//Host-name

    private $DB_USER;//Username

    private $DB_PWD;//Password

    private $DB_NAME;//Database-name 

    private $DB_CHARSET;//Charset

    private $conn;//Connection

    public function __construct($config=[]){

        $this->DB_HOST = $config['DB_HOST'];
        $this->DB_USER = $config['DB_USER'];
        $this->DB_PWD = $config['DB_PWD'];
        $this->DB_NAME = $config['DB_NAME'];
        $this->DB_CHARSET = $config['DB_CHARSET'];

        $this->ConnectDb();//Connect and select database
        $this->SetCharset();//Set Charset
    }

    private function ConnectDb(){

        if(!$this->conn = @mysqli_connect($this->DB_HOST,$this->DB_USER,$this->DB_PWD,$this->DB_NAME)){

            echo mysqli_error(Database::$conn);
            exit;
        }
    }

    private function SetCharset(){

        mysqli_set_charset($this->conn,$this->DB_CHARSET);

    }
    //Close database
    public function __destruct()
    {
        mysqli_close($this->conn);
    }


}

$db = [

    'DB_HOST' => 'localhost',

    'DB_USER' => 'root',

    'DB_PWD' => 'g1039384t',

    'DB_NAME' => 'tippo',

    'DB_CHARSET' => 'utf8'

];

$conn_obj = new Database($db);
// var_dump($conn_obj);


?>