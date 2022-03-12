let username = document.querySelector("#username");
let email = document.querySelector("#email");
let password = document.querySelector("#password");
console.log(Object.keys(localStorage));

const addUser = (e) => {
  let user = {
    username: username.value,
    email: email.value,
    password: password.value,
  };
  console.log(JSON.parse(localStorage.getItem(`${user.username}`)));
  for (let [key, value] of Object.entries(localStorage)) {
    console.log(value);
    console.log(email.value);
    if (value.includes(email.value)) {
      alert("Email has already been registered!");
      return false;
    } else if (value.includes(username.value)) {
      alert("Username has already been taken!");
      return false;
    }
  }

  if (JSON.parse(localStorage.getItem(`${user.username}`)) == null) {
  
    localStorage.setItem(`${user.username}`, JSON.stringify(user));
    alert("Registration completed, you can now log in");
    window.location.href = "index.php?signIn";
    e.preventDefault();
  }
};

const clearStorage = () => {
  localStorage.clear();
  alert("clearing stored users");
  window.location.reload;
};
