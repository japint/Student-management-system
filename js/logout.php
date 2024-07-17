<?php
session_start();
unset($_SESSION['UserLogin']);
unset($_SESSION['Access']);
// to redirect, avoining resubmission
header("Location: index.php");
exit(); 
