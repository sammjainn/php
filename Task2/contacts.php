<?php

  require('config/config.php');
  require('config/db.php');

  // Create Query
  $query = 'SELECT * FROM task2 ORDER BY created_at DESC';

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
    <h1>Contacts & Messages</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">Name</th>
          <th scope="col">Subject</th>
          <th scope="col">Message</th>
          <th scope="col">Query</th>
          <th scope="col">Timestamp</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($posts)): ?>
        <?php foreach ($posts as $post): ?>
        <tr>
          <td><?php echo $post['id']; ?></td>
          <td><?php echo $post['email']; ?></td>
          <td><?php echo $post['name']; ?></td>
          <td><?php echo $post['subject']; ?></td>
          <td><?php echo $post['message']; ?></td>
          <td><?php echo $post['query']; ?></td>
          <td><?php echo $post['created_at']; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
      </tbody>
    </table>  
  </div>

<?php include('inc/footer.php'); ?>







