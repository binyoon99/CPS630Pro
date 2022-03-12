let quantityDisplay = document.querySelector(".quantity");
let quantityDisplay2 = document.querySelector(".quantity2");
let quantity = 1;
let quantity2 = 1;
quantityDisplay.innerHTML = quantity;
quantityDisplay2.innerHTML = quantity2;

const increment = () => {
  quantity++;
  quantityDisplay.innerHTML = quantity;
};

const decrement = () => {
  if (quantity == 1) {
    return;
  }
  quantity--;
  quantityDisplay.innerHTML = quantity;
};

const increment2 = () => {
  quantity2++;
  quantityDisplay2.innerHTML = quantity2;
};

const decrement2 = () => {
  if (quantity2 == 1) {
    return;
  }
  quantity2--;
  quantityDisplay2.innerHTML = quantity2;
};

let cards = document.querySelectorAll(".card");
cards.forEach(function (item) {
  item.addEventListener("dragstart", handleDragStart);
  item.addEventListener("dragend", handleDragEnd);
});

let shoppingCart = document.getElementById("shoppingCart");
shoppingCart.addEventListener("dragenter", handleDragOver);
shoppingCart.addEventListener("drop", handleDrop);
shoppingCart.addEventListener("dragenter", handleDragEnter);

function handleDragStart(ev) {
  this.style.opacity = "0.4";
  console.log(
    "dragStart: dropEffect = " +
      ev.dataTransfer.dropEffect +
      " ; effectAllowed = " +
      ev.dataTransfer.effectAllowed
  );

  // Add this element's id to the drag payload so the drop handler will
  // know which element to add to its tree
  console.log(ev.target.id);
  ev.dataTransfer.setData("text/plain", ev.target.id);
  ev.dataTransfer.effectAllowed = "copy";
}

function handleDragEnd(ev) {
  ev.preventDefault();
  this.style.opacity = "1";
  cards.forEach(function (item) {
    item.classList.remove("over");
  });
}
function handleDragOver(ev) {
  ev.preventDefault();
  console.log(
    "dragOver: dropEffect = " +
      ev.dataTransfer.dropEffect +
      " ; effectAllowed = " +
      ev.dataTransfer.effectAllowed
  );
  console.log("YEEEEET");
  console.log(Object.keys(localStorage));
  ev.dataTransfer.dropEffect = "copy";
  return false;
}

function handleDragEnter(ev) {
  this.classList.add("over");
}

function handleDragLeave(ev) {
  this.classList.remove("over");
}

function handleDrop(ev) {
  console.log("YEEEEET");
  const checkItemStorage = (item) => {
    let cartItems = JSON.parse(localStorage.getItem("cartItems"));
    if (cartItems == null) return false;
    return cartItems.some((product) => {
      if (item.item == product.item) {
        console.log(`${item.item} == ${product.item}`);
        return true;
      }
    });
  };
  console.log(
    "drop: dropEffect = " +
      ev.dataTransfer.dropEffect +
      " ; effectAllowed = " +
      ev.dataTransfer.effectAllowed
  );
  let data = ev.dataTransfer.getData("text/plain");
  let price =
    document.getElementById(data).children[1].children[1].children[0]
      .textContent;
  price = parseInt(price.match(/\d+/g));
  let quantity =
    document.getElementById(data).children[1].children[1].children[2]
      .children[1].innerHTML;
  let imageSrc =
    document.getElementById(data).children[0].attributes[1].nodeValue;
  console.log(data, price, quantity, imageSrc);
  let item = {
    item: data,
    image: imageSrc,
    quantity: quantity,
    price: price * quantity,
  };

  console.table(item);
  let cartItems = JSON.parse(localStorage.getItem("cartItems"));
  if (cartItems == null) cartItems = [];
  console.log(item.item);
  if (checkItemStorage(item)) {
    console.log("true, already in storage");
    alert("Item already in your cart!");
  } else {
    cartItems.push(item);
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    console.table(JSON.parse(localStorage.getItem("cartItems")));
  }
  console.log(checkItemStorage(item));
  console.table(JSON.parse(localStorage.getItem("cartItems")));

  ev.stopPropagation();
}
