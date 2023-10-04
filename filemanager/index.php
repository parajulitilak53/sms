<?php require("../process/config.php"); 

session_start();
// its work

if(isset($_SESSION['email'])){

}
 else {
    header("Refresh:0;url=../index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>File Manager</title>
</head>
<body>
<?php require("../inc/navbar.php"); ?>
<a name="" id="" class="btn btn-primary btn-sm m-3 " href="create.php" role="button">Add User</a>

    <table class="table">

      <thead>
        <tr class="bg-secondary ">
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">File</th>
          <!-- <th scope="col">email</th> -->
          <th scope="col">Action</th>
          </thead>
          <tbody>
            <?php
            $query="SELECT *FROM filemanager";
            $result =mysqli_query($con,$query);
            $j=1;
            while( $data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $j++; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td> <img src="<?php echo  '../uploads/'.$data['img_link'];?>" class="img-fluid" alt="..." width="100" height="100"> </td>
                    <td>
                    <a name="" id="" class="btn btn-info btn-sm"   href="edit.php?id=<?php echo $data['id'];?>" role="button">Edit</a>
                    <a name="" id="" class="btn btn-primary btn-sm"   href="view.php?id=<?php echo $data['id'];?>"role="button">View</a>

                    <a name="" id="" class="btn btn-danger btn-sm " href="delete.php?id=<?php echo $data['id'];?>"role="button">Delete</a>
                                    
                    </td>
                </tr>
                <?php

            }
            ?>
            
            

          </tbody>

        
      
      
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>