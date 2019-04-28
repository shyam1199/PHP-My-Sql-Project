<?php include('newcomplain.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Add Worker</h2>
	</div>
	
	<form method="post" action="addworker.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="user" value="<?php echo $user; ?>">
		</div>
		<div class="input-group">
			<label>Department</label>
			<input type="text" name="department" value="<?php echo $department; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		

		<div class="input-group">
			<button type="submit" class="btn" name="reg_worker">Register</button>
		</div>
		
	</form>
</body>
</html>