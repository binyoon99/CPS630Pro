let username = document.querySelector("#username");
let password = document.querySelector("#password");

const authUser = (e) => {

  // used to get all of the existing usernames/passwords from the database
  $.ajax({
    url : 'get-user-pass.php',
    type : 'GET', 
    success : function (result) {
        data = JSON.parse(result);
        console.log(data);
        let flag = false;
        for (let [key, value] of Object.entries(data)) {
          //console.log(value);
          //console.log(value["name"]);
          if (value["name"] == username.value && value["password"] == password.value) {
            console.log("Correct Username and Password!");
            localStorage.setItem("username", username.value);
            localStorage.setItem("user_id", value["user_id"]);
            localStorage.setItem("email", value["email"]);
            window.location.href = "index.php?home";
            flag = true;
          }
        }
        if (flag == false) { alert("Incorrect Username/Password!"); }
    }, 
    error : function () {
      console.log('error with ajax request');
    }
  });

};
  