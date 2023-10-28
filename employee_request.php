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
	<h2>Salary Request Page</h2>
</div>
<div class="content">  
<ul>
        <li><a href="employee_index.php" >Home</a></li>
        <li><a href="employee_details.php" >Profile</a></li>
        <li><a href="employee_request.php" >Salary Request</a></li>
        <li><a href="employee_salary.php" >Salary Details</a></li>
    </ul>	
	  
      <?php 
      $email =$_SESSION['employee_email'];
      $record = mysqli_query($db, "SELECT * FROM employee where employee_email='$email'");

            if ($record) {
                $n = mysqli_fetch_array($record);
                $id = $n['id'];
                

            }
    ?>

		<form action="employee_request.php" method="post">
        <input type="hidden" name="employee_id" value="<?php echo $id; ?>">

            

            <div class="input-group">
                <label for="date">Select date</label>
                <input type="date" name="date" required>

            </div>

            <div class="input-group">
            <button type="submit" class="btn" name="employee_request">Request</button>
            </div>

        </form>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>

		
</body>
</html>