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
    <link rel="stylesheet" href="styles.css" />
    <script src="./signIn.js" defer></script>
    <title>Iter 1</title>
  </head>
  <body>
    <div class="container">
      <div class="con">
        <form>
          <h1>Sign In</h1>
          <input
            type="text"
            name="email"
            id="username"
            placeholder="Enter Email..."
          />
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter Password..."
          />
          <button type="button" onclick="authUser()">Log In</button>
        </form>
      </div>
    </div>
  </body>
</html>
