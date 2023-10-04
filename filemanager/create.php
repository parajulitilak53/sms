<?php require("../process/config.php");

session_start();
// its work

if (isset($_SESSION['email'])) {

} else {
  header("Refresh:0;url=../index.php");
} ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Title</title>
</head>

<body>
<?php require("../inc/navbar.php"); ?>


  <a href="index.php" role="button" class="btn btn-primary btn-sm mb-5 mt-5">MANAGE USER </a>
  <?php
  if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $filename = $_FILES['dataFile']['name'];
    $filesize = $_FILES['dataFile']['size'];
    $explode = explode(".", $filename);
    $file = strtolower($explode['0']);
    $ext = strtolower($explode['1']);
    $newfile = str_replace(" ", "", $file);

    $finalname = $newfile . time() . "." . $ext;
    if ($filesize <= 3000000) {
      if ($ext == 'jpg' || $ext == 'png' | $ext == 'jpeg') {
        if(move_uploaded_file($_FILES['dataFile']['tmp_name'],'../uploads/'.$finalname)){
          $query= "INSERT INTO filemanager (name,img_link) Values('$name', '$finalname')";
          $result=mysqli_query($con, $query);
          if($result){
            echo "file is submitted";
          }
          else{
            echo "file is not submitted";
          }
        }
        else{
          echo "file is not uploaded";
        }
      }
      else{
        echo " extension does not match";
      }
    } else {
      echo "file size must be 3 mb";
    }
  }
  ?>


  </form>
  <form class="row" action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3 col-lg-6">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 col-lg-6">
      <label for="phone" class="form-label">File</label>
      <input type="file" class="form-control" id="phone" name="dataFile" aria-describedby="emailHelp">
    </div>
    <div class="col-lg-12">
      <button type="submit" class="btn btn-primary" name="save">Submit</button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
</body>

</html>