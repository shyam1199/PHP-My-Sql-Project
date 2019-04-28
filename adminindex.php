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
		<h2>Admin</h2>
	</div>
	
		
        <form method="post" action="adminindex.php">

       
		
		
		<div class="input-group">
			<button type="submit" class="btn" name="add_member">Add Member</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="add_worker">Add Worker</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="history">Complain History</button>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="current">Pending Complain</button>
		</div>
		
			<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		    <?php endif ?>
	    
		
		</form>
	


		
		
</body>
</html>