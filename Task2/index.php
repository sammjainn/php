<?php

  require('config/config.php');
  require('config/db.php');

  if(isset($_POST['submit'])){
    if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['subject']) && !empty($_POST['message']) && !empty($_POST['query'])){
      $email = htmlspecialchars($_POST['email']);
      $name = htmlspecialchars($_POST['name']);
      $subject = htmlspecialchars($_POST['subject']);
      $message = htmlspecialchars($_POST['message']);
      $query = htmlspecialchars($_POST['query']);


      $email = mysqli_real_escape_string($conn, $email);
      $name = mysqli_real_escape_string($conn, $name);
      $subject = mysqli_real_escape_string($conn,$subject);
      $message = mysqli_real_escape_string($conn, $message);
      $query = mysqli_real_escape_string($conn, $query);

      $query = "INSERT INTO task2(email, name, subject, message, query) VALUES('$email', '$name', '$subject', '$message', '$query')";

      if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'success.php');
      } else {
        echo 'ERROR: '. mysqli_error($conn);
      }
    }
  }

?>


<?php include('./inc/header.php'); ?>
  <h1 class="page-header text-center my-3">Contact Us</h1>

  <div class="container bg-light text-dark p-0 rounded mt-3" style="max-width:600px;">
    <form class="p-4" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     
        <div class="form-group col-md">
          <label>Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div class="form-group col-md">
          <label>Name</label>
          <input type="text" placeholder="Enter your name" required class="form-control" name="name">
        </div>
     
        <div class="form-group col-md">
          <label>Subject</label>
          <input type="text" placeholder="Enter subject" required class="form-control" name="subject">
        </div>
         
        <div class="form-group col-md">
          <label>Message</label>
          <textarea class="form-control" placeholder="Enter your message" required name="message"></textarea>
        </div>

        <div class="form-group col-md">
          <label>Query</label>
          <textarea class="form-control" placeholder="Enter your query" required name="query"></textarea>
        </div>

        <div class="form-group col-md text-center">
          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
  
    </form>
  </div>
<?php include('./inc/footer.php'); ?>
  