<?php

//adding session
if(!isset($_SESSION)){
    session_start();

}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
    echo "Welcome ".$_SESSION['UserLogin'];
} else {
    header("Location: index.php");
    exit();
}

include_once("../connections/connections.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

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

<h2><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h2>

</body>
</html>