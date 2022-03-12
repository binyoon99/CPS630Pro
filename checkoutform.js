let firstName = document.getElementById("firstName");
let lastName = document.getElementById("lastName");
let inputAddress = document.getElementById("inputAddress");
let inputCity = document.getElementById("inputCity");
let inputState = document.getElementById("inputState");
let inputZip = document.getElementById("inputZip");

//storirngg order information;
const proceedOrder = (e) => {
    let order = {
      firstName: firstName.value,
      lastName: lastName.value,
      inputAddress: inputAddress.value,
      inputCity: inputCity.value,
      inputState: inputState.value,
      inputZip: inputZip.value,
    };
    localStorage.setItem("orderSummary", order);


    
}


 
  