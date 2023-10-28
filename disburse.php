<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pay Roll</title>
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

<div class="header">
	<h2>Pay Roll</h2>
</div>
<div class="content">  	
<ul>
<li><a href="index.php" >Home</a></li>
<li><a href="details.php" >Profile</a></li>
<li><a href="add_employee.php" >Add Employee</a></li>
<li><a href="show_employees.php" >Employee List</a></li>
<li><a href="disburse.php" >Pay Roll</a></li>

</ul>
	  
<?php $results = mysqli_query($db, "SELECT * FROM employee where request='1' && disburse='0'"); ?>

<table>
    <thead>
        <tr>

            <th>Name</th>
        </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['employee_name']; ?></td>
            <td>
                <a href="disburse_salary.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Go</a>
            </td>
            
        </tr>
    <?php } ?>
</table>
<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>

		
</body>
</html>