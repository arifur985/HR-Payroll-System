<?php include('server.php') ?>

<html lang="en">
<head>
    
    <title>Add Employee</title>
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
ul{background-color:blue;}
</style>

</head>
<body>
<div class="container">
    <div class="header">
        <h2>Add Employee</h2>

    </div>
    <div class="content">
    <ul>
        <li><a href="index.php" >Home</a></li>
        <li><a href="details.php" >Profile</a></li>
        <li><a href="add_employee.php" >Add Employee</a></li>
        <li><a href="show_employees.php" >Employee List</a></li>
        <li><a href="disburse.php" >Pay Roll</a></li>

    </ul>
    <form action="add_employee.php" method="post">
    <?php include('errors.php'); ?>
            <div class="input-group">
                <label for="employee_name">Eployee Name</label>
                <input type="text" name="employee_name" required>
            </div>

            <div class="input-group">
                <label for="employee_email">email</label>
                <input type="email" name="employee_email" required>
            </div>

            <div class="input-group">
                <label for="password">password</label>
                <input type="password" name="password_1" required>
            </div>

            <div class="input-group">
                <label for="password">Confirm password</label>
                <input type="password" name="password_2" required>
            </div>

            <div class="input-group">
                <label for="current_salary">Current salary</label>
                <input type="text" name="current_salary" required>
            </div>
            
            <div class="input-group">
            <button type="submit" class="btn" name="add_employee">Submit</button>
            </div>

        </form>
        </div>
</div>
    
</body>
</html>