<?php
	require('config/config.php');
	require('config/db.php');

	//Check for submit
	if(isset($_POST['submit'])){

		// Get form data
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$profession = mysqli_real_escape_string($conn, $_POST['profession']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$query = "UPDATE userlogin SET
					name='$name',
					gender='$gender',
					email='$email',
					mobile='$mobile',
					profession='$profession',
					password='$password'
					WHERE regno = {$update_id}";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else{
			echo 'ERROR: '.mysqli_error($conn);
		}
	}

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['update_id']);

	// Create Query
	$query = 'SELECT * FROM userlogin WHERE regno='.$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result); 
	// var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>

	<div class="container bg-light text-dark p-0 rounded mb-3 mt-3">
		<h1 class="text-center">Add User</h1>
	    <form class="p-4" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
		  <div class="row">
		  	<div class="form-group col-md">
		      <label>Name</label>
		      <input type="text" name="name" class="form-control" placeholder="Enter your name" required value="<?php echo $post['name']; ?>">
		    </div>

		    <div class="form-group col-md">
		      <label>Contact</label>
		      <input type="text" name="mobile" class="form-control" placeholder="Please enter your mobile number" minlength="10" maxlength="10" required value="<?php echo $post['mobile']; ?>">
		    </div>
		   </div>

		   <div class="row">
		   	<div class="form-group col-md">
	          <label>Email</label>
	          <input type="email" name="email" class="form-control" placeholder="Enter your email" required value="<?php echo $post['email']; ?>">
	        </div>

	        <div class="form-group col-md">
	          <label>Password</label>
	          <input type="password" name="password" class="form-control" placeholder="Enter your password" minlength="6" required value="<?php echo $post['password']; ?>">
	        </div>
	       </div>

	      <div class="row">
	      	<div class="form-group col-md">
	          <label for="gender">Gender</label>
	          <div class="form-check row ml-1">
	            <input type="radio" value="male" name="gender" class="form-check-input" <?php if($post['gender']=="male") echo "checked";?>>
	            <label class="form-check-label">Male</label>
	          </div>
	          <div class="form-check row ml-1">
	            <input type="radio" value="female" name="gender" class="form-check-input" <?php if($post['gender']=="female") echo "checked";?>>
	            <label class="form-check-label">Female</label>
	          </div>
	          <div class="form-check row ml-1">
	            <input type="radio" value="other" name="gender" class="form-check-input" <?php if(isset($gender) && $gender=="other") echo "checked";?>>
	            <label class="form-check-label">Other</label>
	          </div>
	        </div>

	        <div class="form-group col-md">
	          <label for="profession">Profession</label>
	          <div class="form-check row ml-1">
	            <input type="radio" value="student" name="profession" class="form-check-input" <?php if($post['profession']=="student") echo "checked";?>>
	            <label class="form-check-label">Student</label>
	          </div>
	          <div class="form-check row ml-1">
	            <input type="radio" value="faculty" name="profession" class="form-check-input" <?php if($post['profession']=="faculty") echo "checked";?>>
	            <label class="form-check-label">Faculty</label>
	          </div>
	        </div>
	       </div>

	      <div class="row d-flex justify-content-center">
	        <div class="form-group col-auto">
	          <input type="hidden" name="update_id" value="<?php echo $post['regno']; ?>">
	          <input type="submit" name="submit" value="Submit" class="btn btn-primary">
	        </div>
	      </div>
    	</form>
  	</div>

<?php include('inc/footer.php') ?>