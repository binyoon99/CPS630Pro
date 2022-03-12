
<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_Mz30zz7nncfQho_Nrqc9kHrlNQKhfG0&callback=initMap&v=weekly"
      async
    ></script>
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_Mz30zz7nncfQho_Nrqc9kHrlNQKhfG0"></script> -->
        <script type="text/javascript">
     
let longAdd = "";
let latAdd = "";
function codeAddress() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById("my-address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      
      longAdd = results[0].geometry.location.lat();
     
      latAdd = results[0].geometry.location.lng();
      alert("Long is : "+longAdd+" Lat is : "+ latAdd);
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
<div id="mapTest">Supfsdfsdfds</div>
<div class = "constainer">
    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" id = "firstName" class="form-control"  placeholder="First Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" id = "lastName" class="form-control" placeholder="Last Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="my-address" placeholder="1234 Main St">
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
  <select class="custom-select" multiple>
  <option selected>Branch1 : Zach Coporation</option>
  <option value="1">Branch2 : Company Addy </option>
  <option value="2">Branch3 : Hey Bin Organizationn</option>

</select>
</form>
        <button id="getCords" onClick="codeAddress();">Place Your Order</button>

</div>

<script>
//Showing map :D
      function initMap(){
        var options = {
          zoom:8,
          center:{lat:-79.4616396, lng:43.7613314}
        }
        var map = new google.maps.Map(document.getElementById("mapTest"), options);
        
        // var marker = new google.maps.Marker({
        //   position: {lat:43.6426, lng:79.3871 }
        //   map: map
        // })
      }
      </script>
        

</body>