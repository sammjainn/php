<?php

  require('config/config.php');
  require('config/db.php');

  // Create Query
  $query = 'SELECT * FROM task3';

  // Get Result
  $result = mysqli_query($conn, $query);

  // Fetch Data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //var_dump($posts);

  // Free Result
  mysqli_free_result($result);

  // Close Connection
  mysqli_close($conn);

?>


<?php include('inc/header.php'); ?>
  <div class="container">
    <h1 class="my-2  text-center">QUESTIONS</h1>
     
<div class="d-flex flex-wrap justify-content-center">
    <?php if(is_array($posts)): ?>
      <?php foreach($posts as $post) : ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="card bg-light m-2 p-2 " style="width: 18rem;">
          <h3>Question: <?php echo $post['id']; ?></h3>
          <p><?php echo $post['question']; ?></p>
                    
            <div>
                <input type="radio" name="myradio" value="option1" />
                <label><?php echo $post['option1']; ?></label>
            </div>
            
            <div>
                <input type="radio" name="myradio" value="option2" />
                <label><?php echo $post['option2']; ?></label>
            </div>  

            <div>
                <input type="radio" name="myradio" value="option3" />
                <label><?php echo $post['option3']; ?></label>
            </div>

            <div>
                <input type="radio" name="myradio" value="option4" />
                <label><?php echo $post['option4']; ?></label>
            </div>

          <input type="submit" class="btn btn-primary" name="submit" value="Check">
          </div>

        </form>
      <?php endforeach; ?>
    <?php endif; ?>

</div>
<p class="bg-info p-2 m-auto w-50">
        <?php
          require('config/db.php');

          if(isset($_POST['submit'])){
            $query = "SELECT * from task3ans WHERE id=".$post['id'];
            $result = mysqli_query($conn, $query);
            $post = mysqli_fetch_assoc($result);

            $radioVal = $_POST['myradio'];
            $ans = $post['correct'];

            if($radioVal == $ans)
            {
              echo "Correct Answer";
            } else{
              echo "Wrong Answer, Try Again";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
          }
        ?>
      </p>
  </div>
<?php include('inc/footer.php'); ?>