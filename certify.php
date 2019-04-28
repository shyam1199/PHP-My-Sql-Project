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
		<h2>Field Engineer</h2>
		<h2>Certify Complain</h2>
	</div>
	
    	<?php include('errors.php'); ?>


    	<?php 
         $row1 = mysqli_fetch_array($certif);
    	if ($row1=="") {
    		echo "No Entry exists to Certify";
    	} ?>
    	<?php while ($row1) { ?>

    		<form method="post" action="certify.php">
   
			<div class="input-group">
		    <label for="dept" class="col-sm-2 col-form-label">Department</label>
		     <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $row1['dept']; ?>">
		    </div>

		 	<div class="input-group">
		    <label for="ptype" class="col-sm-2 col-form-label">Problem Type</label>
		    <input type="text" readonly class="form-control-plaintext" id="ptype" value="<?php echo $row1['ptype']; ?>">
		    </div>
		 
		   	<div class="input-group">
		    <label for="description" class="col-sm-2 col-form-label">Description</label>
		   <input type="text" readonly class="form-control-plaintext" id="description" value="<?php echo $row1['description']; ?>">
		    </div>
		  
		    <div class="input-group">
		    <label for="status" class="col-sm-2 col-form-label">Status</label>
		      <input type="text" readonly class="form-control-plaintext" id="status" value="<?php echo $row1['status']; ?>">
		    </div>

		   <br/> 

			 <div class="input-group">
			 <button type="submit" class="btn" name="cert">Certify</button>
		     </div>
               </form>
    	<?php  $row1 = mysqli_fetch_array($certif);} ?>
 

		
		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	
		
		
 
		
</body>
</html>