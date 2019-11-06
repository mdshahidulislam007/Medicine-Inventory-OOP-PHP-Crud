<?php

require_once('action.php');

extract($_POST);
            
if(isset($_POST["submit"])){
    //here medicines is tablename , $name , $cname and $quantity  entered by html form  
    $obj->insertdata("medicines",$name,$cname,$quantity);
    header('location:index.php');

}

?>