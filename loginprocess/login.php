<?php 
require("../process/config.php"); 
if(isset($_POST['login'])){
    $email= $_POST['email'];
    $password= md5($_POST['password']);

    if($email!="" && $password!=""){
        $login="SELECT *FROM students Where email='$email' AND password='$password'";
        $result=mysqli_query($con, $login);
        $count= mysqli_num_rows($result);
        if($count==1){
            // $row=mysqli_fetch_assoc($result);
            $row=$result->fetch_assoc();
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];

            header("Refresh:0; url=../home.php");
            
        }
        else{
            header("Refresh:0; url=../index.php");

        }
    }
    else{
        echo "Please, fill the required data";
        header("Refresh:2; url=../index.php");
    }
}
?>
