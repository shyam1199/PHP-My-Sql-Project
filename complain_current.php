<?php include('refresh.php') ?>
<?php include('newcomplain.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Complaint Pending</h2>
	</div>
	
<form method="post" action="complain_current.php">
    	<?php include('errors.php'); ?>


    	<?php 
         $row = mysqli_fetch_array($rescurr);
    	if ($row=="") {
    		echo "No previous Current Complain exists";
    	}
    	while ($row) { ?>
   
			<div class="input-group">
		    <label for="dept" class="col-sm-2 col-form-label">Department</label>
		     <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $row['dept']; ?>">
		    </div>

		 	<div class="input-group">
		    <label for="ptype" class="col-sm-2 col-form-label">Problem Type</label>
		    <input type="text" readonly class="form-control-plaintext" id="ptype" value="<?php echo $row['ptype']; ?>">
		    </div>
		 
		   	<div class="input-group">
		    <label for="description" class="col-sm-2 col-form-label">Description</label>
		   <input type="text" readonly class="form-control-plaintext" id="description" value="<?php echo $row['description']; ?>">
		    </div>
		  
		    <div class="input-group">
		    <label for="status" class="col-sm-2 col-form-label">Status</label>
		      <input type="text" readonly class="form-control-plaintext" id="status" value="<?php echo $row['status']; ?>">
		    </div>

		   <br/> <br/>

    	<?php  $row = mysqli_fetch_array($rescurr);} ?>
 

		
		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	</form>
		
</body>
</html>