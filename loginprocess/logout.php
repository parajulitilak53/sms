<?php
session_start();

session_destroy();

// another method

// unset($_SESSION['id']);
// unset($_SESSION['email']);

 echo header("Location: ../index.php?msg=logout_success");