<?php  session_start();?>
<?php include('../../config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Publications</title>
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

*{
    box-sizing: border-box;
}

#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>

</head>
<body>

        <h1 style="color:black; text-align:center;">Publications</h1>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for title names.." title="Type in a name">

    <table id="dctable">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Published By</th>
            <th>Date of Published</th>

        </tr>
    </thead>
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php 
        
        $sql = "SELECT title, description, publishedBy, dateOfPublished from publishedPapers where status='1'";
        $result = $conn->query($sql);
        while( $row = $result->fetch_assoc()) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['publishedBy']; ?></td>
            <td><?php echo $row['dateOfPublished']; ?></td>

        </tr>
        <?php endwhile ?>
    </tbody>
</table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dctable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<section class="jumbotron text-center">
    <div class="container">
        <a href="addPublication.php" class="btn btn-primary my-2">Add Publication</a>
    </div>
</section>
</body>
</html>