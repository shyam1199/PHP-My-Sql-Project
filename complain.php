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
  			<option value="Dept1">Dept1</option>
  			<option value="Dog">Dog</option>
  			<option value="Cow">Cow</option>
		</select>
		if($_POST['submit'] && $_POST['submit'] != 0)
		{
		   	$department=$_POST['department'];
			if($department == "Dept1")
			{
				<select id="department" name="department">                      
  				<option value="None">--Problem--</option>
  				<option value="Problem1">Problem1</option>
  				<option value="Dog">Dog</option>
  				<option value="Cow">Cow</option>
			</select>

			}
		}
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