<?php 
#include_once('connection.php'); 
#include_once('sqlcommands.php');
class User{
  public $username;
  public $email;
  public $password;

  function __construct($username, $email, $password) {
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script src="./signUp.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <title>Iter 1</title>
  </head>
  <body>
    <div class="con">
      <form method="POST">
        <h1>Create an Account to Enter</h1>
        <input
          type="text"
          name="username"
          id="username"
          placeholder="Enter Username..."
          required
        />
        <input
          type="email"
          name="email"
          required
          pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
          id="email"
          placeholder="Enter Email..."
        />
        <input
          required
          type="password"
          name="password"
          id="password"
          placeholder="Enter Password..."
        />
        <button type="button" onclick="addUser()">Create Account</button>
        <h4>Already Registered? <a href="index.php?signIn">Sign In</a></h4>
        <button type="button" style="display:none;" onclick="clearStorage()">clear data</button>
      </form>
    </div>
  </body>
</html>
