<?php

require_once "./Frame/Frame.class.php";

Frame::run();







// //Get the routing parameters
// $p = isset($_GET['p']) ? $_GET['p'] : 'Home';
// $c = isset($_GET['c']) ? $_GET['c'] : 'UserList';
// $a = isset($_GET['a']) ? $_GET['a'] : 'index';
// define("PLAT",$p);

// //Define direction constants
// define("DS",DIRECTORY_SEPARATOR);
// define("ROOT_PATH",getcwd().DS);
// define("FRAME_PATH",ROOT_PATH."Frame".DS);
// define("MODEL_PATH",ROOT_PATH."Model".DS);
// define("CONTROLLER_PATH",ROOT_PATH."Controller".DS);
// define("VIEW_PATH",ROOT_PATH."View".DS.$c.DS);

// //Autoloading the #.class.php
// spl_autoload_register(function($ClassName){

//     $ClassPath = [
//         FRAME_PATH."$ClassName.class.php",
//         MODEL_PATH."$ClassName.class.php",
//         CONTROLLER_PATH."$ClassName.class.php"
//     ];

//     foreach ($ClassPath as $FileName){
        
//         if(file_exists($FileName)){

//             require_once($FileName);
//         }
//     }
// });


// $controllerName = $c."Controller";
// $User_obj = new $controllerName();

// $User_obj->$a();



?>