<?php  session_start();?>
<?php include('../../config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="addachievement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Add Achievement</title>
</head>
<body>
<?php

  
  if(isset($_POST['addAchievement'])){
    $title = $_POST['title'];
    //echo $title;
    $description = $_POST['description'];
    //echo $description;
    $achievedBy = $_POST['achievedBy'];
    //echo $achievedBy;
    $dateOfAchieved = $_POST['dateOfAchieved'];
    //echo $dateOfAchieved;

    //print_r($_SESSION['user']);
    if(isset($_SESSION['userId'])){
      //echo $_SESSION['userId'];
      $userId = $_SESSION['userId'];

      $sql = "INSERT INTO achievements (title, description, achievedBy, dateOfAchieved, userId) VALUES('$title', '$description', '$achievedBy', '$dateOfAchieved', $userId)";
      
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";

        /* $sql1 = "SELECT achId from achievements";
        // $result = $conn->query($sql1);
        // while($row = $result->fetch_assoc()){
             $achId = array($row); */
        }

        // print_r ($_SESSION['achievementId']);
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
    
    
?>
    <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form class="form" action="addAchievement.php" method="post" enctype="multipart/form-data">
              <h2 class="text-center">Add Achievements</h2>
              <hr>
              <div class="form-group <?php echo isset($errors['title']) ? 'has-error' : '' ?>">
                  <label class="control-label">Title</label>
                  <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" pattern="[A-Za-z0-9._-\s]{10,50}" title="characters should be between 10 to 50">
                  <?php if (isset($errors['title'])): ?>
                    <span class="help-block"><?php echo $errors['title'] ?></span>
                  <?php endif; ?>
              </div>
              
              <div class="form-group <?php echo isset($errors['description']) ? 'has-error' : '' ?>">
                  <label class="control-label">Description</label>
                  <input type="text" name="description" value="<?php echo $description; ?>" class="form-control" pattern="[A-Za-z0-9 ]{50,500}" title="characters should be between 50 to 500">
                  <?php if (isset($errors['description'])): ?>
                    <span class="help-block"><?php echo $errors['description'] ?></span>
                  <?php endif; ?>
              </div>
              <div class="form-group <?php echo isset($errors['achievedBy']) ? 'has-error' : '' ?>">
                  <label class="control-label">Achieved By</label>
                  <input type="text" name="achievedBy" value="<?php echo $ahievedBy; ?>" class="form-control" pattern="[A-Za-z ]{10,50}" title="characters should be between 10 to 50">
                  <?php if (isset($errors['achievedBy'])): ?>
                    <span class="help-block"><?php echo $errors['achievedBy'] ?></span>
                  <?php endif; ?>
              </div>
              <div class="form-group <?php echo isset($errors['dateOfAchieved']) ? 'has-error' : '' ?>">
                  <label class="control-label">Date of Achievement</label>
                  <input type="date" name="dateOfAchieved" value="<?php echo $dateOfAchieved; ?>" >
                  <?php if (isset($errors['dateOfAchieved'])): ?>
                    <span class="help-block"><?php echo $errors['dateOfAchieved'] ?></span>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <button type="submit" name="addAchievement" class="btn btn-success btn-block">Add Achievement</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</body>
</html>
