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
		<h2>Field Engineer</h2>
	</div>
	

    <!-- NEW complain -->

		
        <form method="post" action="engineer.php">

		
			
		
		<div class="input-group">
			<button type="submit" class="btn" name="approve">Approve Complain</button>
		</div>

		
		<div class="input-group">
			<button type="submit" class="btn" name="certify">Certify Complain</button>
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="current">Pending Complain</button>
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="history">Complain History</button>
		</div>
	    
		
		</form>
	


		
		
</body>
</html>