<?php 
  $db = mysqli_connect('localhost', 'root', '', 'hr');

  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
ul{background-color:blue;}
div{background-color:blue;}

</style>
</head>
<body>
<div class="header">
	<h2>DashBoard</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
	  <?php endif ?>
	  


    <!-- logged in user information -->
	<?php  if (isset($_SESSION['username'])) : ?>
		<ul>
		<li><a href="index.php" >Home</a></li>
		<li><a href="details.php" >Profile</a></li>
		<li><a href="add_employee.php" >Add Employee</a></li>
		<li><a href="show_employees.php" >Employee List</a></li>
		<li><a href="disburse.php" >Pay Roll</a></li>

		</ul>
		<h1>Hello <strong><?php echo $_SESSION['username']; ?></strong>. Welcome in our system</h1>
		
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>	
</body>
</html>