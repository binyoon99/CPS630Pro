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
    <label for="operation">Operation:</label>
    <select name="operation" onchange="updateFields()" id="operation">
        <option value="select">Select</option>
        <option value="insert">Insert</option>
        <option value="update">Update</option>
        <option value="delete">Delete</option>
    </select>
    From/To  
    <label for="table">Table:</label>
    <select name="table" onchange="updateFields()" id="table">
        <option value="ordersTable">Orders</option>
        <option value="user">Users</option>
        <option value="item">Items</option>
        <option value="truck">Trucks</option>
        <option value="trip">Trips</option>
    </select>
    <br>


    <div id='customsql' style="display:none;">
        <textarea id='sqlcommand' placeholder="write your custom sql command here"></textarea>
        <button type="button" onclick="submitsql()" style="width:auto;">Submit</button>
        <p id="bottomtext"></p>
    </div>



    <div id ='insertion'>
    <form id = "insertForm" style="display:none;">
        <h2>Insert a record</h2>
          <input type="text" class = "orders" id="source" name="source" placeholder="source"></input>  
          <input type="text" class = "orders" id="dest" name="dest" placeholder="destination"></input>  
          <input type="text" class = "orders" id="truck_id" name="truck_id" placeholder="truck id"></input> 
          <input type="text"  class = "orders" id="total_price" name="total_price" placeholder="total price"></input> 
          <input type="number"  class = "orders" name="payment_code" placeholder="payment code" placeholder="payment code"></input> 
          <input type="number" class = "orders" id="distance" name="distance" placeholder="distance(km)"></input> 
          <input type="text" class = "orders" name="Date Issued" placeholder="date issued"></input> 
          <input type="text" class = "orders" name="Date Recieved" placeholder="date recieved"></input> 
          <input type="text" class = "orders" id="user_id" name="user_id" placeholder="user id"></input>  

          <input type="text" class = "users" id="user_name" name="user_name" placeholder="username"></input>  
          <input type="text" class = "users" id="email" name="email" placeholder="email"></input>  
          <input type="text" class = "users" id="password" name="password" placeholder="password"></input>  


    
        <div><p id="result"></p></div>
        <button type="button" onclick="submitForm()">Insert</button>
        
    </form>
    <!-- <form id = "insertUser" style="display:none;">
        <h2>Insert a user record</h2>
        Name<input type="text" id="uname" name="source"></input>
        E-mail<input type="text" id="email" name="dest"></input>
        Password<input type="text" id="password" name="truck_id"></input>
        <div><p id="result"></p></div>
        <button type="button" onclick="submitUser()">Insert</input>
    </form> -->
    </div>
    <br>
    <div id="tablediv" style="width:100%; padding:30px;">
    <table id="orderTable" class="table table-striped" >
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
      function updateFields(){
        let operation = document.getElementById("operation").value;
        let targetTable = document.getElementById("table").value;
        if (operation == 'insert'){
            document.getElementById("insertForm").style.display = "block";
            document.getElementById("orderTable").style.display = "none";
            let options = document.getElementById('insertForm').getElementsByTagName("input");
                for (var i = 0; i < options.length; i++){
                    options[i].style.display = "none"; // first hide all elements, then display which ones to show based on targetTAble selection
                }
            // options = document.getElementById('insertForm').getElementsByTagName("div");
            // for (var i = 0; i < options.length; i++){
            //         options[i].style.display = "none"; // first hide all elements, then display which ones to show based on targetTAble selection
            //     }
            //document.getElementById('result').style.display = "";
        if (targetTable == 'ordersTable'){
            options = document.getElementById('insertForm').getElementsByClassName("orders");
            document.getElementById("customsql").style.display = "none";
            for (var i = 0; i < options.length; i++){
                    options[i].style.display=""; 
                }
            }else if (targetTable == 'user'){
                options = document.getElementById('insertForm').getElementsByClassName("users");
                document.getElementById("customsql").style.display = "none";
            for (let i = 0; i < options.length; i++){
                    options[i].style.display=""; 
                }
            }else {
                document.getElementById('insertForm').style.display = "none";
                document.getElementById("customsql").style.display = "";
            }
            
        }
        
        else if (operation == 'select'){
            document.getElementById("orderTable").style.display = "block";
            document.getElementById("insertForm").style.display = "none";
            document.getElementById("customsql").style.display = "none";
        }
        else {
            document.getElementById("orderTable").style.display = "none";
            document.getElementById("insertForm").style.display = "none";
            document.getElementById("customsql").style.display = "";
        }
    }

        function submitForm(){
            if (document.getElementById("table").value == 'ordersTable'){submitOrder()}
            else if (document.getElementById("table").value == 'user'){submitUser()}
        }

      function submitOrder(){
        
        let user_id = document.getElementById("user_id").value;
        let totalPrice = document.getElementById("total_price").value;
        let distanceTravelled = document.getElementById("distance").value;
        let trip_id = 'lol';
        let sourceAdd = document.getElementById("source").value;
        let dest = document.getElementById("dest").value;

        $.ajax({ 
              url : 'insert-order.php',
              async: true,
              data :  {  
                        userId : user_id,
                        total_price : totalPrice,
                        distance : distanceTravelled,
                        tripId : trip_id,
                        source : sourceAdd,
                        destination : dest
                      },
              type : 'POST', 
              success : function (result) {
                if (result.substring(10,15)=="Fatal"){
                document.getElementById("result").innerHTML = "Error Inserting Into DataBase; Check Field Types And Try Again.";
                document.getElementById("result").style.color = "red";
                }else{
                document.getElementById("result").innerHTML = result;
                document.getElementById("result").style.color = "green";
                }
              }, 
              error : function (error) {
                console.log("error", error);
                
              }
            });
      }

      function submitsql(){
          let text = document.getElementById('sqlcommand').value;
          $.ajax({
              url : 'customsql.php', 
              async : true,
              data : {
                text : text
              },
              type : 'POST', 
              success : function (result) {
                if (result.substring(10,15)=="Fatal"){
                document.getElementById("bottomtext").innerHTML = "SQL Error, review code and retry.";
                document.getElementById("bottomtext").style.color = "red";
                }else{
                document.getElementById("bottomtext").innerHTML = result;
                document.getElementById("bottomtext").style.color = "green";
                }
            
              }, 
              error : function (error) {
                console.log(error);
              }
            });
      }

      function submitUser() {
        let username = document.getElementById('user_name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        $.ajax({
              url : 'insert-user.php',
              async : true,
              data : {
                name : username,
                email : email, 
                password : password
              },
              type : 'POST', 
              success : function (result) {
                if (result.substring(10,15)=="Fatal"){
                document.getElementById("result").innerHTML = "Error Inserting Into DataBase; Check Field Types And Try Again.";
                document.getElementById("result").style.color = "red";
                }else{
                document.getElementById("result").innerHTML = result;
                document.getElementById("result").style.color = "green";
                }
            
              }, 
              error : function (error) {
                console.log(error);
              }
            });
      }
    
  </script>
</html>
