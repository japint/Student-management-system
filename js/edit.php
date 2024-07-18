<?php

include_once("../connections/connections.php");

$con = connection();

// Check if ID is set in the URL
if(isset($_GET['ID'])) {
    $id = mysqli_real_escape_string($con, $_GET['ID']);

    // SQL query
    $sql = "SELECT * FROM student_list WHERE id = '$id'";
    $result = $con->query($sql);
    
    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No student found with this ID.";
        exit();
    }
} else {
    echo "No ID provided.";
    exit();
}

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    
    
    // UPDATE query
    $sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', gender = '$gender' WHERE id = '$id'";
    if($con->query($sql)) {
        header("Location: details.php?ID=".$id);
        exit();
    } else {
        echo "Error updating record: " . $con->error;
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

        <form action="" method="post">

            <label>First Name</label>
            <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name']; ?>">

            <label>Last Name</label>
            <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name']; ?>">

            <label>Gender</label>
            <select name="gender" id="gender">
                <option value="Male" <?php echo ($row['gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($row['gender'] == "Female") ? 'selected' : ''; ?>>Female</option>
            </select>

            <input type="submit" name="submit" value="Update">
        </form>

</body>
</html>