<?php include('refresh.php') ?>
<?php include('newcomplain.php')?>
<?php include('errors.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Complaint Page</h2>
	</div>
	

    <!-- NEW complain -->

		
        <form method="post" action="index.php">
		
		
		<div class="input-group">
			<button type="submit" class="btn" name="complain_user">New Complain</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="complain_current">Current Complaint</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="complain_history">Complaint History</button>
		</div>



		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	    
		
		</form>
	


		
		
</body>
</html>