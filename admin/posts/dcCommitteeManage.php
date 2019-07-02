<?php session_start()?>
<?php include('../../config.php')?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add DC Committee Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css"> -->
    <!-- <script src="main.js"></script> -->
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<?php
if(isset($_POST['add'])){
 $dcId= $_POST['dcId'];
 $dcName= $_POST['dcName'];
 $dcDesg=$_POST['dcDesg'];
 $dcDescription= $_POST['dcDescription'];

 $sql = "INSERT INTO dcCommittee(dcId, dcName, dcDesg, dcDescription) VALUES('$dcId', '$dcName', '$dcDesg', '$dcDescription')";
 if ($conn->query($sql) === TRUE) {
  //echo "New Record Inserted Successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>

<div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <form class="form" action="dcCommitteeManage.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center">Add DC Committee Details</h2>
          <hr>
            <div class="form-group <?php echo isset($errors['dcId']) ? 'has-error' : '' ?>">
              <label class="control-label">DC Committee Id</label>
              <input type="text" name="dcId" value="<?php echo $dcId; ?>" class="form-control" pattern="(\bEMP)[0-9]{2,10}" title="dcId will be in this format 'EMP11'">
              <?php if (isset($errors['dcId']) ): ?>
                <span class="help-block"><?php echo $errors['dcId'] ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['dcName']) ? 'has-error' : '' ?>">
              <label class="control-label">DC Committee Name</label>
              <input type="text" name="dcName" value="<?php echo $dcName; ?>" class="form-control" pattern="[A-Za-z ]{10,25}" title="10 to 25 alpahabetical characters">
              <?php if (isset($errors['dcName'])): ?>
                <span class="help-block"><?php echo $errors['dcName'] ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['dcDesg']) ? 'has-error' : '' ?>">
              <label class="control-label">Designation</label>
              <input type="text" name="dcDesg" class="form-control" pattern="[A-Za-z._-]{1,}[A-Za-z]{1,}" title="10 to 50 characters and may be space and hyphen">
              <?php if (isset($errors['dcDesg'])): ?>
                <span class="help-block"><?php echo $errors['dcDesg'] ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['dcDescription']) ? 'has-error' : '' ?>">
              <label class="control-label">Description </label>
              <input type="text" name="dcDescription" class="form-control" pattern="[A-Za-z0-9._- ]{1,}[A-Za-z0-9]{1,}" title="50 to 250 characters">
              <?php if (isset($errors['dcDescription'])): ?>
                <span class="help-block"><?php echo $errors['dcDescription'] ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
            <button type="submit" name="add" class="btn btn-success btn-block">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>