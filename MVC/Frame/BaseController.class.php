<?php

abstract class BaseController{

    protected function jump($message,$url='?',$time=2){

        echo "<h2>{$message}</h2>";
        header("refresh:{$time}; url={$url}");  

    }

}




?>