<?php

class AddUser{

    private $user;
    private $email;
    private $psw;
    private $time;
    private $conn_Db;

    public function __construct($user1,$email1,$psw1,$conn){

        $this->user = $user1;
        $this->email = $email1;
        $this->psw = $psw1;
        $this->conn_Db = $conn;
    }
    public function Add_User(){
        
        if($this->user == "" || $this->psw == ""){  
    
            echo "<script>alert('Please complete your Adding form!');</script>";  
    
        }else{  

            $sql = "select username from user where username = '$this->user'";
    
            $num = $this->conn_Db->CountRow($sql);
    
            if($num){  
    
                echo "<script>alert('user is already exist, please readd.');</script>";  
    
            }else{  
                
                $this->time = time();
    
                $sql_insert = "insert into user (username,email,password,time) values('$this->user','$this->email','$this->psw','$this->time')";  
    
                $result = $this->conn_Db->AffectedRow($sql_insert);  
    
                if($result){  
    
                    echo "<script>alert('Add successfully!');</script>";  
    
                }else{  
        
                    echo "<script>alert('System'); </script>";  
    
                }  
    
            } 
    
        }  
        
    }        
    
}




?>