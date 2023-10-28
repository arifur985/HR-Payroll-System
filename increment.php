<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Increment</title>
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
	<h2>Salary Increment Page</h2>
</div>
<div class="content">  	
    <ul>
        <li><a href="index.php" >Home</a></li>
        <li><a href="details.php" >Profile</a></li>
        <li><a href="add_employee.php" >Add Employee</a></li>
        <li><a href="show_employees.php" >Employee List</a></li>
    </ul>
	  
      <?php 
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $record = mysqli_query($db, "SELECT * FROM employee WHERE id=$id");

            if ($record) {
                $n = mysqli_fetch_array($record);
                $name = $n['employee_name'];
                $salary = $n['current_salary'];
                $increment = $n['increment'];



            }
        }
    ?>

		<form action="increment.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="current_salary" value="<?php echo $salary; ?>">


            <div class="input-group">
                <label for="increment">Increment Rate in %</label>
                <input type="number" name="increment" value="<?php echo $increment; ?>">

            </div>


            <div class="input-group">
            <button type="submit" class="btn" name="increment_btn">Confirm</button>
            </div>

        </form>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>

		
</body>
</html>