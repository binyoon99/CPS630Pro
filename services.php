<?php 
  include_once('get-items.php');
?>
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
    <link rel="stylesheet" href="styles.css" />
    <script src="./services.js" defer></script>
    <title>Iter 1</title>
  </head>
  <body>
  <img 
    src= "./images/cartIcon.jpg" 
    alt="Shopping Cart Icon" 
    width = 80 
    height=80 
    style="float: right; margin-right: 50px;" 
    id="shoppingCart"
                ondragover="event.preventDefault()">
    <div class="container">
    <h1>We offer high end kitchen appliances</h1>
    <?php #php code to load items from the database and display on the page 
      if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
          echo "<div class='card' draggable='true' id=".$row["item_name"]."title>
          <img
            class='card-img-top'
            src=".$row["img_src"]."
            alt='Card image cap'
          />
          <div class='card-body'>
            <p class='card-text'>".$row["item_desc"]."</p>
            <div class='quantity-select'>
              <p>".$row["price"]."</p>
              <p>Choose Quantity</p>
              <span
                ><button class='qBtn' onclick=\"decrement(".$row["item_id"].")\">-</button>
                <span id=".$row["item_id"].">1</span>
                <button class='qBtn' onclick=\"increment(".$row["item_id"].")\">+</button></span
              >
            </div>
          </div>
        </div>";
        }
      }
    ?>

    </div>
  </body>
</html>
