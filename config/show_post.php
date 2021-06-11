<?php

  // Connect to db
  include('db_connect.php');
  // Construct query
  $sql = "SELECT * FROM post
    ORDER BY post_time DESC";
  // Query and get result
  $result = mysqli_query($conn, $sql);
  // Fetch result as array
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  mysqli_close($conn);

?>