<?php include('server.php') ?>

<html lang="en">
<head>
    
    <title>Employee Log In</title>
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
        <h2>Employee Log In Form</h2>

    </div>
    <form action="employee_login.php" method="post">
    <?php include('errors.php'); ?>
    <h3>Please enter your username and password</h3>

            <div class="input-group">
                <label for="employee_email">Email</label>
                <input type="text" name="employee_email" required>
            </div>

            <div class="input-group">
                <label for="password">password</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">

            <button type="submit" class="btn" name="login_employee">Log In</button>
            </div>

        </form>
</div>
    
</body>
</html>