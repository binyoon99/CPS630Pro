<?php

include('connection.php');

$text = $_POST['text'];

$query = $text;
if (isset($_POST['text'])){
    $result = mysqli_query($conn,$query);
if ($result) {
    echo 'command completed successfully';
} else {
    echo "error: " . mysqli_error($conn);
}
}else {
    echo "Failure, check fields and try again.";
}


$conn->close();

?>