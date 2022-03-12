let username = document.querySelector("#username");
let password = document.querySelector("#password");
let storedUser = JSON.parse(localStorage.getItem("user"));

// console.log(JSON.parse(localStorage.getItem("user")));
// console.table(localStorage.getItem("user"));
console.log(Object.keys(localStorage));
const authUser = (e) => {
  let storedUser = JSON.parse(localStorage.getItem(`${username.value}`));
  if (
    username.value == storedUser.username &&
    password.value == storedUser.password
  ) {
    // console.log("Correct Username and Password!");
    window.location.href = "index.php?home";
  } else {
    alert("Incorrect Username/Password!");
  }
};
  