let cartDisplay = document.querySelector(".cart-items");
console.log(JSON.parse(localStorage.getItem("cartItems")));
let items = JSON.parse(localStorage.getItem("cartItems"));

if (items != null) {
  for (let i = 0; i < items.length; i++) {
    let div = document.createElement("div");
    div.classList.add("card");
    div.innerHTML = `<h1>${items[i].item}</h1>
                    <img src=${items[i].image}>
                    <p>Quantity: ${items[i].quantity}</p>
                    <p>Price: $${items[i].price}`;
    cartDisplay.appendChild(div);
  }
  console.log(items);
  let totalprice = 0;
  for (let i = 0; i < items.length; i++) {

    totalprice += items[i].price;
  }
  
  document.getElementById("totalDisplay").innerHTML = "Your total is: $" + totalprice;
}else{
  
  document.getElementById("totalDisplay").innerHTML = 'Your Shopping Cart is empty!';
}


function checkOutItem() {
  if (items != null) {
  alert(`Your total price is : $${totalprice}\n Please click okay to proceed to the checkout`);
  window.location.href = "index.php?checkout";
  return totalprice;
  }else{
    alert('Your Shopping Cart is empty!');
  }

}