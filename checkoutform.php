
<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script 
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_Mz30zz7nncfQho_Nrqc9kHrlNQKhfG0&callback=initMap&libraries=&v=weekly"
     async
    ></script>
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_Mz30zz7nncfQho_Nrqc9kHrlNQKhfG0"></script> -->
        <script type="text/javascript">
const addy = { "lat" : "43.096249", "lng" : "-79.076973" };
const zach = { "lat" : "43.740540", "lng" : "-79.321830" };
const bin = { "lat" : "43.836921", "lng" : "-79.540896" };

let longAdd = "";
let latAdd = "";
var map;
var isMapEmpty = true;
var directionsDisplay;


function insertOrder() {
  
      // submit ajax request to post order information in database
      let user_id = localStorage.getItem(Object.keys(localStorage)[0]); console.log("user_id", user_id);
      let totalPrice = localStorage.getItem("totalPrice");
      let distanceTravelled = 15; //will implement distance matrix api (time permitting)
      let trip_id = 1; // get this from ajax callback
      let sourceAdd = '';
      switch (branch.value){
        case "zach":
          sourceAdd = JSON.stringify(zach);
          break;
        case "addy":
          sourceAdd = JSON.stringify(addy);
          break;
        case "hyebin":
          sourceAdd = JSON.stringify(bin);
          break;
      }
      let dest = document.getElementById("my-address").value;

      let ajaxdata = 
                      {  
                        "userId" : user_id,
                        "total_price" : totalPrice,
                        "distance" : distanceTravelled,
                        "tripId" : trip_id
                      }
               
      let ajaxtosend = JSON.stringify(ajaxdata);
                   
    $.ajax({  // i know the code is terrible i am sincerely very sorry  -adnan
              url : 'insert-order.php',
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
                console.log(result);
              }, 
              error : function (error) {
                console.log("error", error);
              }
            });

  codeAddress();
}

function codeAddress() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById("my-address").value;

    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {

      
      longAdd = results[0].geometry.location.lat();
     
      latAdd = results[0].geometry.location.lng();
        
    
    
    let branch = document.getElementById("branch");
    let origin = new google.maps.LatLng(longAdd,latAdd);
    let destination = '' ;
    switch (branch.value){
      case "zach":
        alert("Your order has been shipped to Branch1: Zach Corp, \n please use the map the pick your item up");
        destination=  new google.maps.LatLng(zach.lat,zach.lng);
        break;
      case "addy":
        alert("Your order has been shipped to Branch2: Company Addy, \n please use the map the pick your item up");
        destination=  new google.maps.LatLng(addy.lat, addy.lng);
        break;
      case "hyebin":
        alert("Your order has been shipped to Branch3: Hey Bin Org, \n please use the map the pick your item up");
        destination=  new google.maps.LatLng( bin.lat,bin.lng);
        break;

    }




    var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer();
 directionsDisplay = new google.maps.DirectionsRenderer();


  // it should clear the routes ... but its not working
if (directionsDisplay != null && !isMapEmpty) {
  console.log('oopsie');
    directionsDisplay.setMap(null);
    directionsDisplay = null;
    isMapEmpty = true;
    
}
    console.log(origin+" pog "+ destination);
    isMapEmpty = false;
  var request = { 
            origin: origin,
            destination: destination,
            travelMode: 'DRIVING'
};
  directionsService.route(request, function(result, status) {
    if (status == 'OK') {
      console.log("yeet")
      directionsRenderer.setDirections(result);
    }
  });
  directionsRenderer.setMap(map);



      }
      else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
    


  }
        </script>
 
<script src="./checkoutform.js" defer></script>
  </head>
<body>

<div class = "constainer">
    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" id = "firstName" class="form-control"  placeholder="First Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" id = "lastName" class="form-control" placeholder="Last Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="my-address" placeholder="1234 Main St" required>
  </div>
  <div class="form-group">
    <label for="inputPayment">Payment Card No.</label>
    <input type="password" class="form-control" maxlength="16" id="my-payment" placeholder="1234 5678 9999 9999" required>
  </div>
  <!-- <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div> -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Provinces </label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Ontario</option>
        <option>Alberta</option>
        <option>British Columbia</option>
        <option>Manitoba</option>
        <option>New Brunswick</option>
        <option>Newfoundland and Labrador</option>
        <option>Nova Scotia</option>
        <option>Prince Edward Island</option>
        <option>Quebec</option>
        <option> Saskatchewan</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <select class="custom-select" id = "branch" multiple>
  <option value="zach">Branch1 : Zach Coporation</option>
  <option value="addy">Branch2 : Company Addy </option>
  <option value="hyebin">Branch3 : Hey Bin Organizationn</option>

</select>
</form>
        <button id="getCords" onClick="insertOrder()">Place Your Order</button>

</div>

<script>
//Showing map :D
      function initMap(){
       
        const myLatLng = {lat:43.657650, lng:-79.377388};

        map = new google.maps.Map(document.getElementById("mapTest"), {
          zoom: 15,
          center: myLatLng,
        });
        new google.maps.Marker({
          position : myLatLng,
          map,
          title: "Sup",

        });
       

      }

 
</script>
<div id="mapTest" style="position:relative; overflow:hidden; height: 500px; width: 500px; "></div>
  </body>
</html>