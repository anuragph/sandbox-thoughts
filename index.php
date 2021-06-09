<?php
  // Connect to db
  // Make query
  // Get result
  // Fetch result as array
  // Loop through results and push to DOM.
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
          <textarea class="form-control" id="textarea" rows="3" maxlength="255" placeholder="Upto 255 characters..."></textarea>
        </div>
        <input class="btn btn-secondary" type="submit" name="submit" value="Submit">
    </form>
    </div>
    
    <!-- Posts -->
    <div class="post">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur magni aut quae tempora voluptatem similique pariatur ratione ipsum voluptate!</p>
      <p class="text-secondary"><i>Submitted on 13/05/2021</i></p>
    </div>
    
    <hr>
    
  </div>

  
</body>
</html>