<?php

include('connection.php');

#if (isset($_POST['userId'])){

#echo gettype($_POST['user_id']);
#$temp = serialize($_POST['mydata']);
#echo $temp;
#$jsondata = ($_POST['data']);
#echo gettype($jsondata);


// $userId = $jsondata->user_id;
// $total_price = $jsondata->totalPrice;
// $distance = $jsondata->distanceTravelled;
// $tripId = $jsondata->trip_id;
// $source = $jsondata->sourceAdd;
// $destination = $jsondata->dest;
// $truck_id = 1;

// foreach($jsondata as $key => $value){
//     echo 'key: '. $key .' value: '.$value.'\n';
// }

$userId = $_POST['userId'];
$total_price = $_POST['total_price'];
$distance = $_POST['distance'];
$tripId = $_POST['tripId'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$truck_id = 1;

$trip = "INSERT INTO trip (source, dest, truck_id) VALUES ('$source','$destination', '$truck_id');";

if (mysqli_query($conn,$trip)) {
    $trip_id = $conn->insert_id;
    //echo 'success inserting into trip' . $trip_id;
} else {
    echo "error: " . mysqli_error($conn);
}

$order = "INSERT INTO ordersTable (date_issued, date_recieved, total_price, payment_code, user_id, trip_id) VALUES (DEFAULT,DEFAULT,$total_price,1,$userId,$trip_id);";

if (mysqli_query($conn,$order)) {
    $orderId = $conn->insert_id;
    echo "success inserting record into order database";
} else {
    echo "error: " . mysqli_error($conn);
}

#} else { echo "sent an empty array :( "; }

$conn->close();

?>