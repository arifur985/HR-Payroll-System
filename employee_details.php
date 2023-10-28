<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Details</title>
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
	<h2>Employee Details</h2>
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
$results = mysqli_query($db, "SELECT * FROM employee where employee_email='$email'"); 
?>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
        </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['employee_name']; ?></td>
            <td><?php echo $row['employee_email']; ?></td>
            <td><?php echo $row['current_salary']; ?></td>

            <td>
                <a href="update_employee.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            
        </tr>
    <?php } ?>
</table>
<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>

		
</body>
</html>