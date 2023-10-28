<?php include('server.php') ?>

<html lang="en">
<head>
    
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
  background-color: powderblue;
}
h2 {
  color: black;
}
p {
  color: red;
}
form{background-color:cyan;}
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>HR Log In Form</h2>

    </div>
    <form action="login.php" method="post">
    <?php include('errors.php'); ?>
    <h3>Please enter your username and password</h3>

            <div class="input-group">
                <label for="username">User name</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">

            <button type="submit" class="btn" name="login_user">Log In</button>
            </div>
            <p>Sign Up as HR<a href="registration.php"><b>Sign Up</b></a></p>
            <p>Login as Employee?<a href="employee_login.php"><b> Log In</b></a></p>


        </form>
</div>
    
</body>
</html>