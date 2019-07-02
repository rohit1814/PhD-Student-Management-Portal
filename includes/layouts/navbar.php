<!-- the whole site is wrapped in a container div to give it some margin on the sides -->
<!-- closing container div can be found in the footer -->
<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <h1><u>Scholar Management Portal</u></h1>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="includes/logic/showAchievement.php">Achievements</a></li>
        <li><a href="includes/logic/showPublication.php">Publications List</a></li>
        <li><a href="includes/logic/availableScholarship.php">Available Scholarship</a></li>
        <li><a href="includes/logic/dcCommittee.php">DC Committee</a></li>
        <li><a href="includes/logic/results.php">Results</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['user'])): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['user']['username'] ?> <span class="caret"></span></a>

              <?php if (isAdmin($_SESSION['user']['id'])): ?>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo BASE_URL . 'admin/profile.php'?>">Profile</a></li>
                  <li><a href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">Dashboard</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a></li>
                </ul>
              <?php else: ?>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a></li>
                </ul>
              <?php endif; ?>
          </li>
        <?php else: ?>
          <li><a href="<?php echo BASE_URL . 'signup.php' ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="<?php echo BASE_URL . 'login.php' ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>