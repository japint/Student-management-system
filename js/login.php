<!-- login form and user view details -->

<?php

//adding session
if(!isset($_SESSION)){
    session_start();

}

include_once("../connections/connections.php");
$con = connection();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        // to redirect, avoining resubmission
        header("Location: index.php");
        exit(); 
    } else {
        echo "No user found.";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    
    <h1>Login Page</h1>
    <br>
    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username" id="username">

        <label>Password</label>
        <input type="password" name="password" id="password">
        
        <button type="submit" name="login">login</button>
    </form>

</body>
</html>