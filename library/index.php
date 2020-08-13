<?php
	require('config/config.php');
	require('config/db.php');

	if(isset($_POST['delete'])){

		// Get form data
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$query = "DELETE FROM userlogin 
					WHERE regno = {$delete_id}";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else{
			echo 'ERROR: '.mysqli_error($conn);
		}
	}
	// Create Query
	$query = 'SELECT * FROM userlogin ORDER BY created_at';

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Books</h1>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#RegNo</th>
		      <th scope="col">Name</th>
		      <th scope="col">Gender</th>
		      <th scope="col">Email</th>
		      <th scope="col">Mobile</th>
		      <th scope="col">Profession</th>
		      <th scope="col">Password</th>
		      <th scope="col">Created at</th>
		      <th scope="col">Action</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(is_array($posts)): ?>
		  	<?php foreach ($posts as $post): ?>
				<tr>
					<td><?php echo $post['regno']; ?></td>
					<td><?php echo $post['name']; ?></td>
					<td><?php echo $post['gender']; ?></td>
					<td><?php echo $post['email']; ?></td>
					<td><?php echo $post['mobile']; ?></td>
					<td><?php echo $post['profession']; ?></td>
					<td><?php echo $post['password']; ?></td>
					<td><?php echo $post['created_at']; ?></td>
					<td>
						<a href="<?php echo ROOT_URL;?>edituser.php?update_id=<?php echo $post['regno'];?>" class="btn btn-dark">Update</a>
					</td>
					<td>
						<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
							<input type="hidden" name="delete_id" value="<?php echo $post['regno']; ?>">
							<input type="submit" name="delete" value="Delete" class="btn btn-danger">
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		  </tbody>
		</table>	
	</div>
<?php include('inc/footer.php') ?>


		