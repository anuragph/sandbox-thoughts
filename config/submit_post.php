<?php

  // Check if form submitted
  if(isset($_POST['submit'])) {
    $post_text = $_POST['post_text'];
    
    // if not empty connect to db and add security to post
    if(!empty(trim($post_text))) {

      // Connect to db
      include('db_connect.php');

      $post_text = mysqli_real_escape_string($conn, $post_text);
      
      // Construct query
      $sql = "INSERT INTO post(post_text) VALUES('$post_text')";

      // save to db and check
      if(mysqli_query($conn, $sql)) {
        // Success: Close connection and redirect
        mysqli_close($conn);
        header('Location: index.php');

      } else {
        echo 'Error: ' . mysqli_error($conn);
      }
    }
  }

?>