<?php include("../inc/header.php"); ?>
<body>
<?php include("../inc/navbar.php"); ?>
    <section>
        <div class="container py-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-danger bg-light p-3 shadow-sm">Students Management System</h5>
                    <a name="" id="" class="btn btn-primary btn-sm mb-5" href="create.php" role="button">Add Students</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Program</th>
                                <th scope="col">RollNo</th>
                                <th scope="col">Acation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT *FROM students";
                            $result = mysqli_query($con, $query);
                            $i = 1;
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['phone']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['program']; ?></td>
                                    <td><?php echo $data['rollno']; ?></td>
                                    <td>
                                        <a name="" id="" class="btn btn-info btn-sm" href="edit.php?id=<?php echo $data['id'];?>" role="button">Edit</a>
                                        <a name="" id="" class="btn btn-primary btn-sm" href="view.php?id=<?php echo $data['id'];?>" role="button">View</a>
                                        <a name="" id="" class="btn btn-danger btn-sm" href="../process/delete_student.php?id=<?php echo $data['id'];?>" onclick="return confirm('Are you to delete data??');" role="button">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include("../inc/footer.php"); ?>