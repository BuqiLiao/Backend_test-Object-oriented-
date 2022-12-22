<?php

$dsn = "mysql:host=localhost;port=3306;dbname=tippo;charset=utf8";
$username = "root";
$password = "g1039384t";

$pdo = new PDO($dsn,$username,$password);

$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{
    $sql = "INSERT INTO user(username,email,password) VALUES(:username,:email,:password)";

    $result_obj = $pdo->prepare($sql);
    
    $result_obj->bindValue(':username','admin102');
    $result_obj->bindValue(':email','');
    $result_obj->bindValue(":password",102);
    
    $result_obj->execute();
}catch(Exception $e){
    echo "Error Code:".$e->getCode()."<br>";
    echo "Error Line:".$e->getLine()."<br>";
    // echo "Error File:".$e->getFile()."<br>";
    echo "Error Message:".$e->getMessage();
}




// var_dump($result);

// $line1 = $result_obj->fetchAll(PDO::FETCH_ASSOC);
// var_dump($line1);

// $num = $result_obj->rowCount();
// echo $num;



?>