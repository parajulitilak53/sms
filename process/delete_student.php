
<?php

require("config.php");
        if(isset($_GET['id'])){
            $id= $_GET['id'];

            $select="DELETE FROM students WHERE id=$id";
            $select_result = mysqli_query($con, $select);
            
            header("Refresh:0; url=../students/index.php");
        }

?>