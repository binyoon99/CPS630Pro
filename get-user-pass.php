<?php

include('connection.php');

#get all current usernames, emails
$query = "SELECT user_id, name, password, email FROM user;";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $temparray = array();
    while($row = $result->fetch_assoc()) { 
        $temparray[] = $row;
    }
    echo json_encode($temparray);
}

$result->close();
$conn->close();

?>