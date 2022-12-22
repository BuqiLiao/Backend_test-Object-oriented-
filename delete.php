<?php

require_once './Connection.php';

if (is_array($_POST['username'])){

    // print_r($_POST);

    $username_0 = join(',', $_POST['username']);
    
    $username = "'". str_replace(",","','",$username_0 ) . "'";

    $sql = "delete from user where username in($username)";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        echo 'delete successfully!';
        header("refresh:2; url= List.php");    
        die();
    } else {

        echo 'delete unsuccessfully!';
        header("refresh:2; url= List.php");   
        die();
    }

}elseif (is_string($_GET['username'])) {

    $username ="'" . $_GET['username'] . "'";

    $sql = "delete from user where username in($username)";

    $result = $conn_Db->AffectedRow($sql);

    if ($result) {

        echo 'delete successfully!';
        header("refresh:2; url= List.php");    
        die();

    } else {

        echo 'delete unsuccessfully!';
        header("refresh:2; url= List.php");   
        die();
    }


}else{
    echo 'Illegal data!';
    die;
}

?>