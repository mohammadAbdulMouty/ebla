<?php
session_start();
 unset($_SESSION['user']);
 unset($_SESSION['pass']);
 session_destroy();
 header("location: index.php");
 exit();
 ?>