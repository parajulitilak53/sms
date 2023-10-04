<?php require("process/config.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>


    <section>
        <div class="container py-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-danger bg-light p-3 shadow-sm">Students Management System</h5>
                    <a name="" id="" class="btn btn-primary btn-sm mb-5" href="index.php" role="button">Manage Student</a>
                    <?php
                    if (isset($_POST['save'])) {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $program = $_POST['program'];
                        $rollno = $_POST['rollno'];
                        $password = md5($_POST['password']);

                        if ($name != "" && $phone != "" && $email != "" && $program != "" && $rollno != "" && $password != "") {

                            $query = "SELECT * FROM students WHERE email='$email'";

                            // Execute the query
                            $result = mysqli_query($con, $query);
    
                            // Check if the query returned any rows
                            if (mysqli_num_rows($result) > 0) {
                                ?>
                                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Email already taken.</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                                header("Refresh:2");
                            } 
                            else {  
                            $insert = "INSERT INTO students (name, phone, email, program, rollno, password) VALUES('$name', '$phone', '$email', '$program', '$rollno', '$password')";
                            $result = mysqli_query($con, $insert);
                            if ($result) {
                    ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Your Data is submitted successfully</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                    <?php
                                header("Refresh:2; url=index.php");
                            } else {

                                ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Your Data is not submitted successfully</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                    <?php
                                header("Refresh:2; url=create.php");
                            }
                        }
                        } else {
                            echo "all field are required";
                            header("Refresh:2; url=create.php");
                        }
                    }
                    ?>
                    <form class="row" action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 col-lg-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="program" class="form-label">Program</label>
                            <input type="text" class="form-control" name="program" id="program" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="rollno" class="form-label">Roll NO.</label>
                            <input type="number" class="form-control" name="rollno" id="rollno" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" name="save">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>