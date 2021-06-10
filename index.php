<?php

  /* ===== 
  Show posts
  ======= 
  */
  // Connect to db
  include('./config/db_connect.php');
  // Construct query
  $sql = "SELECT * FROM post
    ORDER BY post_time DESC";
  // Get result
  $result = mysqli_query($conn, $sql);
  // Fetch result as array
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  mysqli_close($conn);


  /* =====
  Submit posts
  ======
  */
  // Check if form submitted
  if(isset($_POST['submit'])) {
    $post_text = $_POST['post_text'];
    
    // if not empty connect to db and add security to post
    if(!empty(trim($post_text))) {

      // Connect to db
      include('./config/db_connect.php');

      $post_text = mysqli_real_escape_string($conn, $post_text);
      
      // Construct query
      $sql = "INSERT INTO post(post_text) VALUES('$post_text')";

      // save to db and check
      if(mysqli_query($conn, $sql)) {

        mysqli_close($conn);
        header('Location: index.php');

      } else {
        echo 'Error: ' . mysqli_error($conn);
      }
    }
  }
  
  
  // redirect

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css">

  <title>Sandbox Thoughts</title>
</head>
<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>Sandbox Thoughts</b></a>
      </div>
    </nav>
  </header>

  <div class="container">
    <div class="jumbotron bg-primary my-5">
      <p class="lead text-light">Have a small thought or quote you would like to share?</p>
      <!-- Form -->
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group">
          <label for="textarea" class="form-label text-light mt-4">Write it down here:</label>
          <textarea class="form-control" id="textarea" rows="3" maxlength="255" name="post_text" placeholder="Upto 255 characters..."></textarea>
        </div>
        <input class="btn btn-secondary" type="submit" name="submit" value="Submit">
    </form>
    </div>
    
    <!-- Posts -->
    <!-- Loop through results and push to DOM. -->
    <?php foreach($posts as $post) { ?>
      <div class="post">
      <p><?php echo $post['post_text']; ?></p>
      <p class="text-secondary"><i>Submitted on <?php echo $post['post_time']; ?></i></p>
      </div>
      <hr>
    <?php } ?>
    
  </div>

  
</body>
</html>