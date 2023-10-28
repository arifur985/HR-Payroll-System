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
	<h2>Employee Edit Page</h2>
</div>
<div class="content">  
<ul>
        <li><a href="employee_index.php" >Home</a></li>
        <li><a href="employee_details.php" >Profile</a></li>
        <li><a href="employee_request.php" >Salary Request</a></li>
        <li><a href="employee_salary.php" >Salary Detail</a></li>
        
        
    </ul>	
	  
      <?php 
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $record = mysqli_query($db, "SELECT * FROM employee WHERE id=$id");

            if ($record) {
                $n = mysqli_fetch_array($record);
                $username = $n['employee_name'];
                $email = $n['employee_email'];
                $password = $n['password'];

            }
        }
    ?>

		<form action="update_employee.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="input-group">
                <label for="employee_name">Employee name</label>
                <input type="text" name="employee_name" value="<?php echo $username; ?>">

            </div>

            <div class="input-group">
                <label for="employee_email">Email</label>
                <input type="text" name="employee_email" value="<?php echo $email; ?>">

            </div>
            

            <div class="input-group">
                <label for="password">Password</label>
                <input type="text" name="password" value="<?php echo $password; ?>">

            </div>

            <div class="input-group">
            <button type="submit" class="btn" name="update_employee">Update</button>
            </div>

        </form>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>

		
</body>
</html>