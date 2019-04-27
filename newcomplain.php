<?php 

	// variable declaration
	$username="";
	$dept ="";
	$type="";
	$description="";
	$address="";
	$errors = array(); 
	$_SESSION['success'] = "";
	$username=$_SESSION['username'];

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

// go to complain
	if (isset($_POST['complain_user'])) {
		header('location: complain.php');
	}


	//go to comlain history
	if (isset($_POST['complain_history'])) {
		header('location: complain_history.php');
	}


	

	// REGISTER USER
	if (isset($_POST['submit_complain'])) {

		// receive all input values from the form
		$dept = mysqli_real_escape_string($db, $_POST['dept']);
		$type = mysqli_real_escape_string($db, $_POST['type']);
		$description = mysqli_real_escape_string($db, $_POST['description']);
		$address = mysqli_real_escape_string($db, $_POST['address']);

		// form validation: ensure that the form is correctly filled
		if (empty($dept)) { array_push($errors, "Department is required"); }
		if (empty($type)) { array_push($errors, "Problem type is required"); }
		if (empty($description)) { array_push($errors, "Problem description is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }

		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO complain (username, dept, type, description,address) 
					  VALUES('$username' ,'$dept', '$type', '$description','$address')";
			mysqli_query($db, $query);

			header('location: index.php');
		}

	}
?>