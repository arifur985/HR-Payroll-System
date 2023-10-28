<?php include('server.php') ?>

<html lang="en">
<head>
    
    <title>Registration</title>
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
        <h2>HR Registration</h2>

    </div>
    <form action="registration.php" method="post">
    <?php include('errors.php'); ?>
            <div class="input-group">
                <label for="username">User name</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password_1" required>
            </div>

            <div class="input-group">
                <label for="password">Confirm password</label>
                <input type="password" name="password_2" required>
            </div>
            <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Submit</button>
            </div>
        

        </form>
</div>
    
</body>
</html>