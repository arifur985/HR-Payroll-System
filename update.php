<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
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

<div class="header">
	<h2>Edit Page</h2>
</div>
<div class="content">  	
    <ul>
        <li><a href="index.php" >Home</a></li>
        <li><a href="details.php" >Profile</a></li>
        <li><a href="add_employee.php" >Add Employee</a></li>
        <li><a href="show_employees.php" >All Employee</a></li>
        <li><a href="disburse.php" >Disburse Salary</a></li>

    </ul>
	  
      <?php 
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

            if ($record) {
                $n = mysqli_fetch_array($record);
                $username = $n['username'];
                $email = $n['email'];
            }
        }
    ?>

		<form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="input-group">
                <label for="username">User name</label>
                <input type="text" name="username" value="<?php echo $username; ?>">

            </div>

            <div class="input-group">
                <label for="email">email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">

            </div>

            <div class="input-group">
            <button type="submit" class="btn" name="update_user">Update</button>
            </div>

        </form>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>

		
</body>
</html>