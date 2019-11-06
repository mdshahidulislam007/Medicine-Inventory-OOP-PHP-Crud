

<?php include'action.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Medicine Inventory</title>
</head>
<body>
    <!-- Header Start -->
    <div class="container top-fixed">
            <h1 class="text-center text-primary txt"> <b>Palash Medicine Inventory</b></h1>
    </div>
    <!-- Header End -->

    <!-- Panel Start -->
    <div class="container">
         <div class="row">
             <div class="col-md-3"></div>
             <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"> Enter Medicine Details</div>
                    <div class="panel-body">


<?php

if(isset($_GET["update"])){

    $id = $_GET["id"] ?? null;
    $mydata = $obj->read($id);
    foreach ($mydata as $data) {
    
?>


                    <!-- Form for View & Update Start -->
                    <form action="update.php" method="post">
                            <table class="table table-hover">
                                <tr>
                                    <td colspan="2" align="center">
                                        <p class="text text-danger">*Edit Information</p>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>
                                       Name
                                    </td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control" placeholder="Medicine Name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       Company Name
                                    </td>
                                    <td>
                                        <input type="text" name="cname" value="<?php echo $data['cname'] ?>" class="form-control" placeholder="Company name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       Quantity
                                    </td>
                                    <td>
                                        <input type="text" name="quantity" value="<?php echo $data['quantity'] ?> " class="form-control" placeholder="Enter Quantity">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" id="update" name="update" value="Update" class="btn btn-primary">
                                    </td>
                                </tr>

                            </table>
                        </form>
                        <!-- Form for View & Update End -->
<?php

    } //foreach close
}//if condition close
else{

?>

                        <!-- Form for Insert Start -->
                       <form action="insert.php" method="post">
                            <table class="table table-hover">
                                <tr>
                                    <td>
                                       Name
                                    </td>
                                    <td>
                                        <input type="text" id="nm" name="name" class="form-control" placeholder="Medicine Name" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       Company Name
                                    </td>
                                    <td>
                                        <input type="text"  name="cname" class="form-control" placeholder="Company name" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       Quantity
                                    </td>
                                    <td>
                                        <input type="text"  name="quantity" class="form-control" placeholder="Enter Quantity" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit"  name="submit" value="Store" class="btn btn-primary">
                                    </td>
                                </tr>

                            </table>
                        </form> 
                         <!-- Form for Insert End -->

<?php  } //else close ?>

                    </div>
                </div>
             </div>
             <div class="col-md-3"></div>

         </div>
    </div>
    <!-- Panel End -->

     <!-- Data Table Start -->
    <div class="container">
        <div class="row">
            <div class="com-md-2"></div>
            <div class="com-md-8">
                <table class="table table-bordered">
                    <tr class="thead">
                        <th>#</th>
                        <th>Medicine Name</th>
                        <th>Company Name</th>
                        <th>Available Quantity</th>
                        <th colspan="2" class="text-center">Action</th>
                        
                    </tr>
<?php

    $mydata = $obj->displayall("medicines");
    foreach ($mydata as $data) {
        
?>
                    <tr>
                        <td> <?php echo $data['id'] ?> </td>
                        <td><?php  echo $data['name'] ?></td>
                        <td> <?php echo $data['cname'] ?></td>
                        <td><b><?php echo $data['quantity'] ?></b></td>

                        <td><a href="index.php?update=1&id=<?php echo $data['id']; ?>" class="btn btn-info" >Update</a></td>

                        <td><a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>
                        
                    </tr>
<?php

    }//foreach close

?>

                </table>
            </div>
            <div class="com-md-2"></div>

        </div>

    </div>
    <!-- Data Table end -->

    <!-- Footer start -->
    
            <footer class=" container ft">
                <div class="text-center">© 2019 Copyright:
                    <a class="" href="#">Md. Shahidul Islam Palash</a>
                </div>
            </footer>
    <!-- Footer End -->



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</body>
</html>