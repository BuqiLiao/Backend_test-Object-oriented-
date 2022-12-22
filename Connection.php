<?php
//Autoloading the #.class.php
spl_autoload_register(function($ClassName){

    $ClassPath = [
        "../class/$ClassName.class.php",
    ];

    foreach ($ClassPath as $FileName){
        
        if(file_exists($FileName)){

            require_once($FileName);
        }
    }
});

// $conn_Db = Database::GetInstance($db);
// var_dump($conn_Db);



// $arr = $conn_Db->FetchAll("Select * from user",3);
// var_dump($arr);
// $count = $conn_Db->CountRow("select * from user");
// var_dump($count);


?>