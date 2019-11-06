<?php

    require_once('action.php');

    $id = $_GET['id'];
 
   $var= $obj->delete($id);

    if($var){
        header('location:index.php');
    }else{
        echo "Failed to Delete Record";
    }

?>