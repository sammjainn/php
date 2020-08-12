<?php

  require('config/config.php');
  require('config/db.php');

  if(isset($_POST['submit'])){
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['password']) && !empty($_POST['gender']) && !empty($_POST['dob'])){
      $first_name = htmlspecialchars($_POST['first_name']);
      $last_name = htmlspecialchars($_POST['last_name']);
      $password = htmlspecialchars($_POST['password']);
      $gender = htmlspecialchars($_POST['gender']);
      $dob = htmlspecialchars($_POST['dob']);


      $first_name = mysqli_real_escape_string($conn, $first_name);
      $last_name = mysqli_real_escape_string($conn, $last_name);
      $password = mysqli_real_escape_string($conn,$password);
      $gender = mysqli_real_escape_string($conn, $gender);
      $dob = mysqli_real_escape_string($conn, $dob);

      $query = "INSERT INTO task1(first_name, last_name, password, gender, dob) VALUES('$first_name', '$last_name', '$password', '$gender', '$dob')";

      if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'welcome.php');
      } else {
        echo 'ERROR: '. mysqli_error($conn);
      }
    }
  }

?>



<?php include('./inc/header.php'); ?>
  <h1 class="page-header text-center my-3">Sign Up</h1>

  <div class="container bg-light text-dark p-0 rounded mt-3" style="max-width:600px;">
    <form class="p-4" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     
        <div class="form-group col-md">
          <label>First Name</label>
          <input type="text" placeholder="Enter first name" required class="form-control" name="first_name">
        </div>
     
        <div class="form-group col-md">
          <label>Last Name</label>
          <input type="text" placeholder="Enter last name" required class="form-control" name="last_name">
        </div>
         
        <div class="form-group col-md">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Enter your password" minlength="6" required name="password">
        </div>

        <div class="form-group col-md">
          <label>Gender</label>
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
          <label>Date of Birth</label>
          <input type="date" class="form-control" name="dob" placeholder="Enter your birth date" required>
        </div>

        <div class="form-group col-md text-center">
          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
  
    </form>
  </div>
<?php include('./inc/footer.php'); ?>
  