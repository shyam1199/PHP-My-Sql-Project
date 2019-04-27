<?php include('refresh.php') ?>
<?php

  $user=$_SESSION['username'];
  // connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');


	$query = "SELECT * FROM complain WHERE username='$user'";
	$results = mysqli_query($db, $query);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Complaint History</h2>
	</div>
	
<form method="post" action="complain_history.php">
    	<?php include('errors.php'); ?>

		
	<div class="input-group">
    <label for="dept" class="col-sm-2 col-form-label">Department</label>
      <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $dept; ?>">
    </div>
    	<div class="input-group">
    <label for="type" class="col-sm-2 col-form-label">Problem Type</label>
      <input type="text" readonly class="form-control-plaintext" id="type" value="<?php echo $type; ?>">
    </div>
    	<div class="input-group">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
      <input type="text" readonly class="form-control-plaintext" id="description" value="<?php echo $description; ?>">
    </div>
    	<div class="input-group">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
      <input type="text" readonly class="form-control-plaintext" id="status" value="<?php echo $status; ?>">
    </div>
 

 

		
		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	</form>
		
		
 
		
</body>
</html>