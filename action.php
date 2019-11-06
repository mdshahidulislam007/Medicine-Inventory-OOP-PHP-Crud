<?php

class Database{

    var $host="localhost";
	var $user="root";
	var $pass="";
    var $db="mstock";
    
    //for database connection
	public function connect()
	{  
        $con=mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
        return $con;
	}

    ////  data insert into Database ///

    public function insertdata($tbName,$n,$cn,$q){

         $con=$this->connect();

	     mysqli_query($con,"insert into .$tbName values('','".$n."','".$cn."','".$q."')");

    }

   ///// Display data from Database /////////////

    public function displayall($tbName){

            $con=$this->connect();
            $array=array();

            $query = mysqli_query($con,"select * from .$tbName");
                    
            while($row = mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            
            return $array;
     }
     
     //for show into panel
     public function read($id)
     {
        $con = $this->connect();
        $array=array();
        $sql=  " SELECT  `name`, `cname`, `quantity` FROM `medicines` WHERE id = $id";

        $q = mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($q)){
            $array[] = $row;
        }
        
        return $array;
     }

     //////for update
     public function update($name,$cname,$quantity,$id)
     {
         $con = $this->connect();
         $sql= "UPDATE `medicines` SET `name`= '$name',`cname`= '$cname',`quantity`='$quantity'  WHERE id=$id";
         $res = mysqli_query($con, $sql);
         if($res){
            return true;
        }else{
            return false;
        }
     }
     
     /////for Delete Data /////

    public function delete($id){

        $con = $this->connect();
		$sql = "DELETE FROM `medicines` WHERE id=$id";
        $res = mysqli_query($con, $sql);

 		if($res){
 			return true;
 		}else{
 			return false;
 		}
	}



 } ///end of class////

	

            // object create
            $obj = new Database(); 

            $obj->displayall("medicines"); //For Display All data

        

?>