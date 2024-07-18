<?php
session_start();
unset($_SESSION['UserLogin']);
unset($_SESSION['Access']);
// to redirect, avoid resubmission
header("Location: index.php");
exit(); 
