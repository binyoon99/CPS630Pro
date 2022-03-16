
let items2 = JSON.parse(localStorage.getItem("cartItems"));

let totalprice2=0;
//let keys = Object.keys(localStorage);
//let userInformation = JSON.parse(localStorage.getItem(keys[1]));
let username = localStorage.getItem("username");
let email = localStorage.getItem("email");

for (let i =0; i <items2.length; i++){
    totalprice2 +=  items2[i].price;
}
localStorage.setItem("totalPrice",totalprice2);
// document.getElementById("orderSummary").innerHTML = "Dear valued customer"+storedUser+ " Your total is: $"+ totalprice;

document.getElementById("orderSummary").innerHTML = 
`<h1> Dear Valued Customer, ${username}</h1>
<h2>Please Review items and shipping</h2>
                    <p Email: ${email}/>

                    <p>Total Price: $${totalprice2}`;

