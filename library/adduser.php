<?php
	require('config/config.php');
	require('config/db.php');

	//Check for submit
	if(isset($_POST['submit'])){

		// Get form data
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$profession = mysqli_real_escape_string($conn, $_POST['profession']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$query = "INSERT INTO userlogin(name, gender, email, mobile, profession, password) VALUES('$name', '$gender', '$email', '$mobile', '$profession', '$password')";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else{
			echo 'ERROR: '.mysqli_error($conn);
		}
	}
?>

<?php include('inc/header.php'); ?>


	<div class="container bg-light text-dark p-0 rounded mb-3 mt-3">
		<h1 class="text-center">Add User</h1>
	    <form class="p-4" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
		  <div class="row">
		  	<div class="form-group col-md">
		      <label>Name</label>
		      <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
		    </div>

		    <div class="form-group col-md">
		      <label>Contact</label>
		      <input type="text" name="mobile" class="form-control" placeholder="Please enter your mobile number" minlength="10" maxlength="10" required>
		    </div>
		   </div>

		   <div class="row">
		   	<div class="form-group col-md">
	          <label>Email</label>
	          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
	        </div>

	        <div class="form-group col-md">
	          <label>Password</label>
	          <input type="password" name="password" class="form-control" placeholder="Enter your password" minlength="6" required>
	        </div>
	       </div>

	      <div class="row">
	      	<div class="form-group col-md">
	          <label for="gender">Gender</label>
	          <div class="form-check row ml-1">
	            <input type="radio" value="male" name="gender" checked class="form-check-input">
	            <label class="form-check-label">Male</label>
	          </div>
	          <div class="form-check row ml-1">
	            <input type="radio" value="female" name="gender" class="form-check-input">
	            <label class="form-check-label">Female</label>
	          </div>
	          <div class="form-check row ml-1">
	            <input type="radio" value="other" name="gender" class="form-check-input">
	            <label class="form-check-label">Other</label>
	          </div>
	        </div>

	        <div class="form-group col-md">
	          <label for="profession">Profession</label>
	          <div class="form-check row ml-1">
	            <input type="radio" value="student" name="profession" checked class="form-check-input">
	            <label class="form-check-label">Student</label>
	          </div>
	          <div class="form-check row ml-1">
	            <input type="radio" value="faculty" name="profession" class="form-check-input">
	            <label class="form-check-label">Faculty</label>
	          </div>
	        </div>
	       </div>

	      <div class="row d-flex justify-content-center">
	        <div class="form-group col-auto">
	          <input type="submit" name="submit" value="Submit" class="btn btn-primary">
	        </div>
	      </div>
    	</form>
  	</div>

<?php include('inc/footer.php') ?>




