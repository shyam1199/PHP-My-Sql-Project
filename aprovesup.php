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
		<h2>Supervisor</h2>
		<h2>Approve Complaint</h2>
	</div>
	
<form method="post" action="aprovesup.php">
    	<?php include('errors.php');

    	 $ap = mysqli_fetch_array($approvs); 
    	if ($ap=="") {
    	echo "No Entry exists to Approve";
    	} else { ?>
		
            <div class="input-group">
		    <label for="dept" class="col-sm-2 col-form-label">Department</label>
		     <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $ap['dept']; ?>">
		    </div>

		 	<div class="input-group">
		    <label for="ptype" class="col-sm-2 col-form-label">Problem Type</label>
		    <input type="text" readonly class="form-control-plaintext" id="ptype" value="<?php echo $ap['ptype']; ?>">
		    </div>
		 
		   	<div class="input-group">
		    <label for="description" class="col-sm-2 col-form-label">Description</label>
		   <input type="text" readonly class="form-control-plaintext" id="description" value="<?php echo $ap['description']; ?>">
		    </div>
		  
			 <br/>
			 <div class="input-group">
			 <button type="submit" class="btn" name="apps">Approve</button>
		     </div>
		 <?php } ?>


		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	</form>
 
		
</body>
</html>