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
  //console.log(JSON.parse(localStorage.getItem(`${user.username}`)));

  // used to get all of the existing usernames/emails from the database
  $.ajax({
    url : 'get-user-email.php',
    type : 'GET', 
    success : function (result) {
        data = JSON.parse(result);
        console.log(data);
        for (let [key, value] of Object.entries(data)) {
          if (value["email"] == email.value) {
            alert("Email has already been registered!");
            return false;
          } else if (value["name"] == username.value) {
            alert("Username has already been taken!");
            return false;
          } else {
            if (JSON.parse(localStorage.getItem(`${user.username}`)) == null) {
              // used to insert new user into database
            $.ajax({
              url : 'insert-user.php',
              async : false,
              data : {
                name : user.username,
                email : user.email, 
                password : user.password
              },
              type : 'POST', 
              success : function (result) {
                console.log(result);
                console.log('successful insertion');
              }, 
              error : function (error) {
                console.log(error);
              }
            });
            //localStorage.setItem("user", JSON.stringify(user));
            alert("Registration completed, you can now log in");
            window.location.href = "index.php?signIn";
            e.preventDefault();
          }
          }
        }
    }, 
    error : function () {
      console.log('error with ajax request');
    }
  });

};

const clearStorage = () => {
  localStorage.clear();
  alert("clearing stored users");
  window.location.reload;
};
