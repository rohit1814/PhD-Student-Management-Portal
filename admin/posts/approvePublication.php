<?php session_start()?>
<?php include('../../config.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Approve Publications</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
#dctable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#dctable td, #dctable th {
  border: 1px solid #dff;
  padding: 8px;
}

#dctable tr:nth-child(even){background-color: #f1f2f3;}

#dctable tr:hover {background-color: #ddd;}

#dctable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF59;
  color: black;
}
</style>

</head>

<body>

<?php
  if(isset($_POST['approve'])){
    $sql1="SELECT userId from publishedPapers where status='0' ORDER BY pubId DESC LIMIT 1";
    $result= mysqli_query($conn, $sql1);
    
     $row = mysqli_fetch_assoc($result);
    //  echo $row['userId'];
    $userId = $row['userId'];
    // echo $row['achId'];
     $sql="UPDATE publishedPapers SET status='1' WHERE userId=$userId";
       $res = $conn->query($sql);
    
    }
  
?>


  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Approve Publications</h1>

          <table id="dctable">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Published By</th>
                <th>Date of Published</th>
                <th>Approve</th>
              </tr>
            </thead>
            <tbody>
        <!--Use a while loop to make a table row for every DB row-->
            <?php 

              $sql = "SELECT title, description, publishedBy, dateOfPublished from publishedPapers where status='0'";
              $result = $conn->query($sql);
              while( $row = $result->fetch_assoc()) : ?>
                <tr>
                <!--Each table column is echoed in to a td cell-->
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td><?php echo $row['publishedBy']; ?></td>
                  <td><?php echo $row['dateOfPublished']; ?></td>
                  <td>
                    <form action="approvePublication.php" method="post">
                    <button name="approve" class="btn btn-primary my-2">Approve</button>
                    <button name="reject" class="btn btn-secondary my-2">Reject</button>
                    </form>
                  </td>
                </tr>
            <?php endwhile ?>
              </tbody>
            </table>
    </div>
  </section>

</html>
