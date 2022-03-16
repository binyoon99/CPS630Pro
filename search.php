
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="styles.css" />
    <title>Kitchen 26</title>
  </head>
  <body>
    <div style="padding-top:10px;padding-left:30px;">
        <input id="searchInput" type="number" id="myInput" style="width:70%;" onkeyup="filterID()" placeholder="Search User/Order ID">
    </div>
    <div style="padding:30px">
        <table id="orderTable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Ordered By</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total Price</th>
                <th scope="col">Delivery Address</th>
            </tr>
        </thead>
        <tbody>
        <?php   

include 'connection.php';
$username = 'addy';
$query = "SELECT order_id, orderstable.user_id, user.name, date_issued, total_price, TRIP.dest FROM ORDERSTABLE INNER JOIN TRIP ON ORDERSTABLE.trip_id = TRIP.trip_id INNER JOIN USER ON USER.user_id = ORDERSTABLE.user_id ";#WHERE USER.name = '$username';";

$result = $conn->query($query);
while($row=$result->fetch_assoc()){
echo "<tr><td>".$row['order_id']."</td><td>".$row['user_id']."</td><td>".$row['name']."</td><td>".$row['date_issued']."</td><td>".$row['total_price']."</td><td>".$row['dest']."</td></tr>";
}


$conn->close();

?>
        </tbody>
        </table>
    </div>
  </body>
  <script>
      function filterID() {
    //     let getUserName = localStorage.getItem("username");
    //   $.ajax({
    //           url : 'search.php',
    //           data : {
    //             name : getUserName,
    //           },
    //           type : 'post', 
    //           success : function (result) {
    //             console.log('success');
    //           }, 
    //           error : function (error) {
    //             console.log(error);
    //           }
    //         });
    let searchBar = document.getElementById("searchInput");
    let searchValue = searchBar.value.toUpperCase();
    let table = document.getElementById('orderTable');
    let tr = table.getElementsByTagName("tr");
    let tds = tr[1].getElementsByTagName("td");

    for (i=1;i<tr.length;i++){
        var uId = tr[i].getElementsByTagName('td')[1];
        var oId = tr[i].getElementsByTagName('td')[0];
        var userId = uId.textContent;
        var orderId = oId.textContent;
        if(userId.indexOf(searchValue) > -1 || orderId.indexOf(searchValue) > -1){
            tr[i].style.display = "";
        }  else {
            tr[i].style.display="none";
        }
    }
 }
    </script> 
</html>
