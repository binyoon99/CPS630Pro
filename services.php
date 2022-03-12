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
      <div class="card" draggable="true" id="toaster">
        <img
          class="card-img-top"
          src="./images/toaster.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <p class="card-text">
            This is a toaster has the ability to make you pog your pants. Yes,
            it's just that damn good
          </p>
          <div class="quantity-select">
            <p>$299 CAD</p>
            <p>Choose Quantity</p>
            <span
              ><button class="qBtn" onclick="decrement()">-</button>
              <span class="quantity"></span>
              <button class="qBtn" onclick="increment()">+</button></span
            >
          </div>
        </div>
      </div>
      <div class="card" draggable="true" id="mixer">
        <img
          class="card-img-top"
          src="./images/mixer.jpg"
          alt="Card image cap"
        />
        <div class="card-body">
          <p class="card-text">
            This is a Kitchen Mixer, it mixes many things proving to be a useful
            appliance
          </p>
          <div class="quantity-select">
            <p>$499 CAD</p>
            <p>Choose Quantity</p>
            <span
              ><button class="qBtn" onclick="decrement2()">-</button>
              <span class="quantity2"></span>
              <button class="qBtn" onclick="increment2()">+</button></span
            >
          </div>
        </div>
      </div>
    
    </div>
  </body>
</html>
