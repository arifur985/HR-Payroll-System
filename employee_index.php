<?php 
  $db = mysqli_connect('localhost', 'root', '', 'hr');

  session_start(); 

  if (!isset($_SESSION['employee_email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: employee_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['employee_email']);
  	header("location: employee_login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
	<h2>Employee Dashboard</h2>
</div>
<div class="content">
<ul>
        <li><a href="employee_index.php" >Home</a></li>
        <li><a href="employee_details.php" >Profile</a></li>
        <li><a href="employee_request.php" >Salary Request</a></li>
        <li><a href="employee_salary.php" >Salary Details</a></li>
        
    </ul>
  	<!-- notification message -->
  	<?php if (isset($_SESSION['employee_success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['employee_success']; 
          	unset($_SESSION['employee_success']);
          ?>
      	</h3>
      </div>
	  <?php endif ?>
	  


    <!-- logged in user information -->
    <?php  if (isset($_SESSION['employee_email'])) : ?>
		<h1>Welcome </h1>

    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>