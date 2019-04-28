<?php 

	// variable declaration
	$username="";
	$user="";
	$row="";
	$dept ="";
	$email="";
	$department="";
	$type="";
	$ptype="";
	$description="";
	$address="";
	$status="";
	$errors = array(); 
	$_SESSION['success'] = "";
	$username= $_SESSION['username'];
	$id="17";
	
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	 $query = "SELECT * FROM complain WHERE username='$username' AND status !='Completed'";
     $rescurr = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE username='$username' AND status='Completed'";
     $reshis = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status='Completed'";
     $his = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status !='Completed'";
     $curr = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='In Queue'";
     $approv = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor'";
     $certif = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='Approved by Engineer'";
     $approvs = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='Certified by Engineer'";
     $certifs = mysqli_query($db, $query);

      // aprove
	if (isset($_POST['app'])) {
		$quer = "UPDATE complain SET status='Approved by Engineer' WHERE id='$id'";
			mysqli_query($db, $quer);
			header('location: aprove.php');
	}
	    // aprove
	if (isset($_POST['cert'])) {
		$quer = "UPDATE complain SET status='Certified by Engineer' WHERE id='$id'";
			mysqli_query($db, $quer);	
			header('location: certify.php');
	}


	   // aprove
	if (isset($_POST['apps'])) {
		$quer = "UPDATE complain SET status='Approved by Supervisor' WHERE id='$id'";
			mysqli_query($db, $quer);

           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Water Supply'";
           $allotworker = mysqli_query($db, $query);
            $temp=0;
       
       	while ($temp==0 ) { $data = mysqli_fetch_array($allotworker);

			               $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Water Supply'";
			               $freeworker = mysqli_query($db, $query);
			               $free=mysqli_num_rows($freeworker);
			               $id1=$data['id'];

			           if($data['ptype']=="Pipeline Blockage" && $free >=5 ){
				           	$quer = "UPDATE complain SET worker='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							} 
							    $temp=0;
			           }
		
			           else if($data['ptype']=="Pipeline Leakage" && $free >=3){
				           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
							mysqli_query($db, $quer);

							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }
				           		$temp=0;
			           }
			           else{
			           	$temp=1;
			           }
        	}   	


           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Road Management'";
           $allotworker = mysqli_query($db, $query);
         
           $temp=0;
 		
 		while($temp==0) { 
		 			 $data = mysqli_fetch_array($allotworker);
		           
		           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Road Management'";
		           $freeworker = mysqli_query($db, $query);
		           $free=mysqli_num_rows($freeworker);
		           $id1=$data['id'];

			           if($data['ptype']=="Potholes" && $free >=7 ){
			           	$quer = "UPDATE complain SET worker='7' WHERE id=' $id1' ";
						mysqli_query($db, $quer);
							while($temp<7) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							}   $temp=0;

			           }
			           else if($data['ptype']=="Cleaning" && $free >=3){
			           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
						mysqli_query($db, $quer);
					
							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }

			           else if($data['ptype']=="Reconstruction" && $free >=20){
			           	$quer = "UPDATE complain SET workers='20' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<20) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }


			            else if($data['ptype']=="Speed Breaker" && $free >=5){
			           	$quer = "UPDATE complain SET workers='5' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }
			           else{
			           	$temp=1;
			           }

			}        



          
           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Sewage and Waste Management'";
           $allotworker = mysqli_query($db, $query);
           $temp=0;

           while($temp==0){
				           $data = mysqli_fetch_array($allotworker);
				          
				           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Sewage and Waste Management'";
				           $freeworker = mysqli_query($db, $query);
				           $free=mysqli_num_rows($freeworker);
				           $id1=$data['id'];
				           

				           if($data['ptype']=="Manhole" && $free >=5 ){
				           	$quer = "UPDATE complain SET worker='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
								while($temp<5) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
								}   $temp=0;

				           }
				           else if($data['ptype']=="Drainage Leakage" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
						
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }	$temp=0;
				           }

				           else if($data['ptype']=="Drainage Cleaning" && $free >=7){
				           	$quer = "UPDATE complain SET workers='7' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
								while($temp<7) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				            else if($data['ptype']=="Drainage Repair" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dead Animal" && $free >=4){
				           	$quer = "UPDATE complain SET workers='4' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<4) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dustbin Installation" && $free >=6){
				           	$quer = "UPDATE complain SET workers='6' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
							{ array_push($errors, "required"); }
								while($temp<6) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }   $temp=0;
				           }
				           else{
				           	$temp=1;
				           }
				 }          


			header('location: aprovesup.php');


	}


	    // aprove
	if (isset($_POST['certs'])) {
		$quer = "UPDATE complain SET status='Completed' WHERE id='$id'";
			mysqli_query($db, $quer);	


        $quer = "UPDATE worker SET isfree='Yes' WHERE workid='$id'";
			mysqli_query($db, $quer);	
			 $quer = "UPDATE worker SET workid='' WHERE workid='$id'";
			mysqli_query($db, $quer);	
 		


   $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Water Supply'";
           $allotworker = mysqli_query($db, $query);
            $temp=0;
       
       	while ($temp==0 ) { $data = mysqli_fetch_array($allotworker);

			               $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Water Supply'";
			               $freeworker = mysqli_query($db, $query);
			               $free=mysqli_num_rows($freeworker);
			               $id1=$data['id'];

			           if($data['ptype']=="Pipeline Blockage" && $free >=5 ){
				           	$quer = "UPDATE complain SET worker='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							} 
							    $temp=0;
			           }
		
			           else if($data['ptype']=="Pipeline Leakage" && $free >=3){
				           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
							mysqli_query($db, $quer);

							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }
				           		$temp=0;
			           }
			           else{
			           	$temp=1;
			           }
        	}   	


           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Road Management'";
           $allotworker = mysqli_query($db, $query);
         
           $temp=0;
 		
 		while($temp==0) { 
		 			 $data = mysqli_fetch_array($allotworker);
		           
		           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Road Management'";
		           $freeworker = mysqli_query($db, $query);
		           $free=mysqli_num_rows($freeworker);
		           $id1=$data['id'];

			           if($data['ptype']=="Potholes" && $free >=7 ){
			           	$quer = "UPDATE complain SET worker='7' WHERE id=' $id1' ";
						mysqli_query($db, $quer);
							while($temp<7) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							}   $temp=0;

			           }
			           else if($data['ptype']=="Cleaning" && $free >=3){
			           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
						mysqli_query($db, $quer);
					
							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }

			           else if($data['ptype']=="Reconstruction" && $free >=20){
			           	$quer = "UPDATE complain SET workers='20' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<20) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }


			            else if($data['ptype']=="Speed Breaker" && $free >=5){
			           	$quer = "UPDATE complain SET workers='5' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }
			           else{
			           	$temp=1;
			           }

			}        



          
           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Sewage and Waste Management'";
           $allotworker = mysqli_query($db, $query);
           $temp=0;

           while($temp==0){
				           $data = mysqli_fetch_array($allotworker);
				          
				           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Sewage and Waste Management'";
				           $freeworker = mysqli_query($db, $query);
				           $free=mysqli_num_rows($freeworker);
				           $id1=$data['id'];
				           

				           if($data['ptype']=="Manhole" && $free >=5 ){
				           	$quer = "UPDATE complain SET worker='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
								while($temp<5) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
								}   $temp=0;

				           }
				           else if($data['ptype']=="Drainage Leakage" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
						
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }	$temp=0;
				           }

				           else if($data['ptype']=="Drainage Cleaning" && $free >=7){
				           	$quer = "UPDATE complain SET workers='7' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
								while($temp<7) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				            else if($data['ptype']=="Drainage Repair" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dead Animal" && $free >=4){
				           	$quer = "UPDATE complain SET workers='4' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<4) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dustbin Installation" && $free >=6){
				           	$quer = "UPDATE complain SET workers='6' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
							{ array_push($errors, "required"); }
								while($temp<6) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }   $temp=0;
				           }
				           else{
				           	$temp=1;
				           }
				 }          


			header('location: certifysup.php');
	}


// go to complain
	if (isset($_POST['complain_user'])) {
		header('location: complain.php');
	}


	//go to comlain history
	if (isset($_POST['complain_history'])) {

		header('location: complain_history.php');
	}

	//go to current comlain
	if (isset($_POST['complain_current'])) {

		header('location: complain_current.php');
	}

	//add member
	if (isset($_POST['add_member'])) {

		header('location: addmember.php');
	}


	//add worker
	if (isset($_POST['add_worker'])) {

		header('location: addworker.php');
	}

	//approve
	if (isset($_POST['approvesup'])) {

		header('location: aprovesup.php');
	}

	//certify
	if (isset($_POST['certifysup'])) {

		header('location: certifysup.php');
	}


	//approve
	if (isset($_POST['approve'])) {

		header('location: aprove.php');
	}

	//certify
	if (isset($_POST['certify'])) {

		header('location: certify.php');
	}



	//go to history
	if (isset($_POST['history'])) {

		header('location: history.php');
	}

	//go to current 
	if (isset($_POST['current'])) {

		header('location: current.php');
	}

// REGISTER USER
	if (isset($_POST['reg_mem'])) {
		// receive all input values from the form
		$user = mysqli_real_escape_string($db, $_POST['user']);
		$type = mysqli_real_escape_string($db, $_POST['type']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($user)) { array_push($errors, "Username is required"); }
		if (empty($type)) { array_push($errors, "Type is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {

	        $query = "SELECT * FROM users WHERE username='$user'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 0) {

			$password = md5($password_1);//encrypt the password before saving in the database
			$quer = "INSERT INTO users (username, email, password,type) 
					  VALUES('$user', '$email', '$password', '$type')";
			mysqli_query($db, $quer);

			header('location: adminindex.php');
		}else{
			array_push($errors, "Username already exists");
		}
		}

	}

	// ... 



// REGISTER worker
	if (isset($_POST['reg_worker'])) {
		// receive all input values from the form
		$user = mysqli_real_escape_string($db, $_POST['user']);
		$department = mysqli_real_escape_string($db, $_POST['department']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($user)) { array_push($errors, "Username is required"); }
		if (empty($department)) { array_push($errors, "Department is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {

	        $query = "SELECT * FROM users WHERE username='$user'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 0) {

			$password = md5($password_1);//encrypt the password before saving in the database
			$quer = "INSERT INTO users (username, email, password,type) 
					  VALUES('$user', '$email', '$password', 'worker')";
			mysqli_query($db, $quer);
			$quer = "INSERT INTO worker (username, department) 
					  VALUES('$user', '$department')";
			mysqli_query($db, $quer);

			header('location: adminindex.php');
		}else{
			array_push($errors, "Username already exists");
		}
		}

	}

	// ... 


	// REGISTER USER complain
	if (isset($_POST['submit_complain'])) {

		// receive all input values from the form
		$dept = mysqli_real_escape_string($db, $_POST['dept']);
		$ptype = mysqli_real_escape_string($db, $_POST['ptype']);
		$description = mysqli_real_escape_string($db, $_POST['description']);
		$address = mysqli_real_escape_string($db, $_POST['address']);

		// form validation: ensure that the form is correctly filled
		if (empty($dept)) { array_push($errors, "Department is required"); }
		if (empty($ptype)) { array_push($errors, "Problem type is required"); }
		if (empty($description)) { array_push($errors, "Problem description is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }

		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO complain (username, dept, ptype, description,address) 
					  VALUES('$username' ,'$dept', '$ptype', '$description','$address')";
			mysqli_query($db, $query);

			header('location: index.php');
		}

	}
?>