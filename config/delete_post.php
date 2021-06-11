<?php

  // Check for delete action
  if(isset($_POST['delete'])) {
    // Connect to db
    include('db_connect.php');

    $post_to_delete = mysqli_real_escape_string($conn, $_POST['post_to_delete']);

    $sql = "DELETE FROM post
      WHERE post_id = $post_to_delete";

    //Delete post from db and check
    if(mysqli_query($conn, $sql)) {
      // Success: Close connection and redirect
      mysqli_close($conn);
      header('Location: index.php');
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }

?>