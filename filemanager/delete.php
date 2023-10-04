<?php 
require("../process/config.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $query="SELECT *FROM filemanager WHERE id=$id";
    $result=mysqli_query($con,$query);
    $data=mysqli_fetch_assoc($result);
    $file="../uploads/".$data['img_link'];
    echo $file;
    unlink($file);

    $choose="DELETE FROM filemanager WHERE id=$id";
    $choose_result=mysqli_query($con,$choose);

   header("Refresh:0; url=index.php");
}