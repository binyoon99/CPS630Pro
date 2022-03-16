<?php

include('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
if (isset($_POST['name'])){
    $result = mysqli_query($conn,$query);
if ($result) {
    echo ($result);
    echo 'success inserting';
} else {
    echo "error: " . mysqli_error($conn);
}
}else {
    echo "Failure, check fields and try again.";
}


$conn->close();

?>