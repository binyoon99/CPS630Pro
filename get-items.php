<?php

include('connection.php');
#$items = array();
#get all current items
$query = "SELECT item_id, item_name, price, made_in, img_src, item_desc FROM item";
$result = $conn->query($query);
/*
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) { 
        $items[] = $row;
    }
    #echo json_encode($temparray);
}

$result->close();
$conn->close();

*/

?>