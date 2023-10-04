<?php include("../inc/header.php"); ?>

<body>
<?php include("../inc/navbar.php"); ?>
    <section>
        <div class="container py-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-danger bg-light p-3 shadow-sm">Students Management System</h5>
                    <a name="" id="" class="btn btn-primary btn-sm mb-5" href="index.php" role="button">Manage Student</a>
                    <?php
                    if(isset($_GET['id'])){
                        $id= $_GET['id'];

                        $select="SELECT *FROM students WHERE id=$id";
                        $select_result = mysqli_query($con, $select);
                        // $data=mysqli_fetch_assoc($select_result);
                        $data=$select_result->fetch_assoc();

                    }
                    if (isset($_POST['save'])) {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $program = $_POST['program'];
                        $rollno = $_POST['rollno'];

                        if ($name != "" && $phone != "" && $email != "" && $program != "" && $rollno != "") {
                            $insert = "UPDATE students SET name='$name', phone='$phone', email='$email', program='$program', rollno='$rollno' where id= $id";
                            $result = mysqli_query($con, $insert);
                            if ($result) {
                    ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Your Data is Updated successfully</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                    <?php
                                header("Refresh:2; url=index.php");
                            } else {

                                ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Your Data is not Updated successfully</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                    <?php
                                header("Refresh:2; url=create.php");
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
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?php echo $data['name']; ?>">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $data['phone']; ?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="program" class="form-label">Program</label>
                            <input type="text" class="form-control" id="program" name="program" value="<?php echo $data['program']; ?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="rollno" class="form-label">Roll NO.</label>
                            <input type="number" class="form-control" id="rollno" name="rollno" value="<?php echo $data['rollno']; ?>" aria-describedby="emailHelp">
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" name="save">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include("../inc/footer.php"); ?>