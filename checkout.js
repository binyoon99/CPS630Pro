
let items2 = JSON.parse(localStorage.getItem("cartItems"));

let totalprice2=0;
let keys = Object.keys(localStorage);
let userInformation = JSON.parse(localStorage.getItem(keys[1]));

for (let i =0; i <items2.length; i++){

    totalprice2 +=  items2[i].price;
}
// document.getElementById("orderSummary").innerHTML = "Dear valued customer"+storedUser+ " Your total is: $"+ totalprice;

document.getElementById("orderSummary").innerHTML = 
`<h1> Dear Valued Customer, ${userInformation.username}</h1>
<h2>Please Review items and shipping</h2>
                    <p Emai: ${userInformation.email}/>

                    <p>Total Price: $${totalprice2}`;

