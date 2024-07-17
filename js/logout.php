<?php
session_start();
unset($_SESSION['UserLogin']);
unset($_SESSION['Access']);
echo header("Location: index.php"); // to redirect, avoining resubmission
