<?php  session_start();?>
<?php include('../../config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="addPublication.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Add Publication</title>
</head>
<body>
<?php

  if(isset($_POST['addPublication'])){
    $title = $_POST['title'];
    // echo $title;
    $description = $_POST['description'];
    // echo $description;
    $publishedBy = $_POST['publishedBy'];
    //print_r($_SESSION['user']);
    $dateOfPublished = $_POST['dateOfPublished'];
    //echo $dateOfPublished;
    if(isset($_SESSION['userId'])){
      // echo $_SESSION['userId'];
      $userId = $_SESSION['userId'];
      $sql = "INSERT INTO publishedPapers (title, description, publishedBy, dateOfPublished, userId) VALUES('$title', '$description', '$publishedBy', '$dateOfPublished' , $userId)";
    
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
    }
    
    
?>
    <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form class="form" action="addPublication.php" method="post" enctype="multipart/form-data">
              <h2 class="text-center">Add Achievement</h2>
              <hr>
              <div class="form-group <?php echo isset($errors['title']) ? 'has-error' : '' ?>">
                  <label class="control-label">Title</label>
                  <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
                  <?php if (isset($errors['title'])): ?>
                    <span class="help-block"><?php echo $errors['title'] ?></span>
                  <?php endif; ?>
              </div>
              
              <div class="form-group <?php echo isset($errors['description']) ? 'has-error' : '' ?>">
                  <label class="control-label">Description</label>
                  <input type="text" name="description" value="<?php echo $description; ?>" class="form-control">
                  <?php if (isset($errors['description'])): ?>
                    <span class="help-block"><?php echo $errors['description'] ?></span>
                  <?php endif; ?>
              </div>
              
              <div class="form-group <?php echo isset($errors['publishedBy']) ? 'has-error' : '' ?>">
                  <label class="control-label">Published By</label>
                  <input type="text" name="publishedBy" value="<?php echo $ahievedBy; ?>" class="form-control" pattern="[A-Za-z ]{10,50}" title="characters should be between 10 to 50">
                  <?php if (isset($errors['publishedBy'])): ?>
                    <span class="help-block"><?php echo $errors['publishedBy'] ?></span>
                  <?php endif; ?>
              </div>
              <div class="form-group <?php echo isset($errors['dateOfPublished']) ? 'has-error' : '' ?>">
                  <label class="control-label">Date of Published</label>
                  <input type="date" name="dateOfPublished" value="<?php echo $dateOfPublished; ?>" >
                  <?php if (isset($errors['dateOfPublished'])): ?>
                    <span class="help-block"><?php echo $errors['dateOfPublished'] ?></span>
                  <?php endif; ?>
              </div>

              <div class="form-group">
                <button type="submit" name="addPublication" class="btn btn-success btn-block">Add Publication</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</body>
</html>