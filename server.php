<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hr');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  //update hr details
if (isset($_POST['update_user'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	mysqli_query($db, "UPDATE users SET username='$username', email='$email' WHERE id=$id");
	$_SESSION['message'] = "Updated!"; 
	header('location: details.php');
}

//add employee

if (isset($_POST['add_employee'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['employee_name']);
  $email = mysqli_real_escape_string($db, $_POST['employee_email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $salary = mysqli_real_escape_string($db, $_POST['current_salary']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Employee name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($salary)) { array_push($errors, "Salary is required"); }


  // first check the database to make sure 
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM employee WHERE employee_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['employee_email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO employee (employee_name, employee_email, password,current_salary) 
  			  VALUES('$username', '$email', '$password', '$salary')";
  	mysqli_query($db, $query);
  	
  	header('location: show_employees.php');
  }
}

// LOGIN Employee
if (isset($_POST['login_employee'])) {
  $username = mysqli_real_escape_string($db, $_POST['employee_email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Email is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      $query = "SELECT * FROM employee WHERE employee_email='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results)) {
        $_SESSION['employee_email'] = $username;

        $_SESSION['employee_success'] = "You are now logged in";
        header('location: employee_index.php');
      }else {
          array_push($errors, "Wrong email/password combination");
      }
  }
}
//update employee
if (isset($_POST['update_employee'])) {
	$id = $_POST['id'];
	$username = $_POST['employee_name'];
  $email = $_POST['employee_email'];
  $password = $_POST['password'];


	mysqli_query($db, "UPDATE employee SET employee_name='$username', employee_email='$email', password='$password' WHERE id=$id");
	$_SESSION['message'] = "Updated!"; 
	header('location: employee_details.php');
}

//request salary
if (isset($_POST['employee_request'])) {
	$id = $_POST['employee_id'];
  $date = $_POST['date'];
	mysqli_query($db, "UPDATE employee SET request='1', date='$date' WHERE id=$id");

	header('location: employee_salary.php');
}
//confirm salary
if (isset($_POST['disburse'])) {
	$id = $_POST['id'];
	mysqli_query($db, "UPDATE employee SET disburse='1' WHERE id=$id");

	header('location: disburse.php');
}

//increment salary
if (isset($_POST['increment_btn'])) {
  $id = $_POST['id'];
  $increment = $_POST['increment'];

  $salary = $_POST['current_salary'];
  $final= $salary + ($salary*$increment/100);

	mysqli_query($db, "UPDATE employee SET current_salary='$final', increment='$increment' WHERE id=$id");

	header('location: show_employees.php');
}


?>