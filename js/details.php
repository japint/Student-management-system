<?php

//adding session
if(!isset($_SESSION)){
    session_start();

}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
    echo "Welcome ".$_SESSION['UserLogin']."<br/><br/>";
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
    <form action="delete.php" method="post">
    <a href="index.php"><-Back</a>
    <a href="edit.php?ID=<?php echo $row['ID']; ?>">Edit</a>

    <?php if($_SESSION['Access'] == "administrator") {?>
        <button type="submit" name="delete">Delete</button> <!-- note. when creating and delete feature use only POST -->
        <?php } ?>

        <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
    </form>
    <br />

    <h2><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h2>
    <p>is a <?php echo $row['gender']; ?></p>
</body>
</html>