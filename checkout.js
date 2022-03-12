
let username = document.querySelector("#username");
let totalprice=0;
console.log(Object.keys(localStorage));

for (let i =0; i <items.length; i++){

    totalprice +=  items[i].price;
}
document.getElementById("orderSummary").innerHTML = "Dear valued customer"+storedUser+ " Your total is: $"+ totalprice;
