<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>PayRoll</title>
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
        <li><a href="show_employees.php" >All Employee</a></li>
        <li><a href="disburse.php" >Pay Roll</a></li>

    </ul>
	  
      <?php 
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $record = mysqli_query($db, "SELECT MONTHNAME(date) as mname,request,disburse,employee_name,id FROM employee WHERE id=$id");

            if ($record) {
                $n = mysqli_fetch_array($record);
                $month = $n['mname'];
                $name = $n['employee_name'];

            }
        }
    ?>

		<form action="disburse_salary.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="input-group">
                <label for="username">Pay Roll <b><?php echo $month; ?></b> month salary of <b> <?php echo $name; ?></b></label>

            </div>


            <div class="input-group">
            <button type="submit" class="btn" name="disburse">Confirm</button>
            </div>

        </form>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>

		
</body>
</html>