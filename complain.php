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
		<h2>New Complaint</h2>
	</div>
	
<form method="post" action="complain.php">
    	<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Select Department </label>
			<input type="text" name="dept" value="<?php echo $dept; ?>">
		</div>

		<select id="department" name="department">                      
  			<option value="None">--Select Animal--</option>
  			<option value="Water Supply">Water Supply</option>
  			<option value="Road Management">Road Management</option>
  			<option value="Cow">Cow</option>
		</select>
		<?php
		if($_POST['department'] && $_POST['department'] != 0):
		   	$department=$_POST['department'];
			if($department == "Water Supply"):?>
			
				<select id="problem" name="problem">                      
  				<option value="None">--Problem--</option>
  				<option value="Pipeline Blockage">Pipeline Blockage</option>
  				<option value="Pipeline Leakage">Pipeline Leakage</option>			</select>

			
			<?php elseif($department == "Road Management"): ?>
			
				<select id="problem" name="problem">                      
  				<option value="None">--Problem--</option>
  				<option value="Potholes">Potholes</option>
  				<option value="Cleaning">Cleaning</option>
  				<option value="Reconstruction">Reconstruction</option>
  				<option value="Speed breaker">Speed breaker</option>			</select>

			
			<?php elseif($department == "Sewage & Waste Managemen"): ?>
			
				<select id="problem" name="problem">                      
  				<option value="None">--Problem--</option>
  				<option value="Manhole">Manhole</option>
  				<option value="Drainage Leakage">Drainage Leakage</option>
  				<option value="Drainage Cleaning">Drainage Cleaning</option>
  				<option value="Drainage Repair">Drainage Repair</option>			
				<option value="Dead Animal">Dead Animal</option>	
				<option value="Dustbin installation">Dustbin installation</option>
			</select>

		<?php endif; ?>

	<?php endif; ?>
		
		<div class="input-group">
			<label>Problem Type</label>
			<input type="text" name="ptype" value="<?php echo $ptype; ?>">
		</div>
		<div class="input-group">
			<label>Problem Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>



		<div class="input-group">
			<button type="submit" class="btn" name="submit_complain">Submit Complain</button>
		</div>
		
	

		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	</form>
		
		
 
		
</body>
</html>