<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="ASSETS/cat.png" />
  <link rel="stylesheet" href="../CSS/login.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="box">
      <h2>LOGIN</h2>
      <form action="loginck.php" method="POST">
          <div class="form-group">
            <input type="text" name="username" placeholder="ID">
          </div>
          <div class="form-group">
            <input type="password" name="password" placeholder="PASSWORD">
          </div>
          <button type="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>