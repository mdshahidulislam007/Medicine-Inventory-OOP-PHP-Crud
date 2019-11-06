<?php

require_once('action.php');


extract($_POST);

if(isset($_POST['update'])){
    
    $obj->update($name,$cname,$quantity,$id);

    header('location:index.php');

}

?>