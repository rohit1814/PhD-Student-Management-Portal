<?php include('../../config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form class="form" action="showResults.php" method="post" enctype="multipart/form-data">
              <h2 class="text-center">Phd Student Results</h2>
              <hr>
              <div class="form-group <?php echo isset($errors['class']) ? 'has-error' : '' ?>">
                  <label class="control-label">Semester</label>
                  <select name="class">
                    <option value="">Select</option>
                    <?php $sql = "SELECT * from tblclasses";
                      $results = $conn->query($sql);
                      while($result= $results->fetch_assoc()){?>
                            <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['ClassName']); ?>&nbsp; Section-<?php echo htmlentities($result['Section']); ?></option>
                    <?php }?>
                  </select>

              </div>
              <div class="form-group <?php echo isset($errors['rollid']) ? 'has-error' : '' ?>">
                  <label class="control-label" for="rollid">Roll No.</label>
                  <input type="text" name="rollid" value="<?php echo $description; ?>" class="form-control">
                  <?php if (isset($errors['rollid'])): ?>
                    <span class="help-block"><?php echo $errors['rollid'] ?></span>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <button type="submit" name="result" class="btn btn-success btn-block">Result</button>
              </div>
            </form>
          </div>
        </div>
    </div>

    
</body>
</html>