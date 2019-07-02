<?php session_start()?>
<?php include('../../config.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DC Committee</title>
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
 
    <h1 style="text-align:center;">DC Committee Details</h1>
    <table id="dctable">
    <thead>
        <tr>
            <th>DC Name</th>
            <th>Designation</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php 
        
        $sql = "SELECT dcName, dcDesg, dcDescription from dcCommittee";
        $result = $conn->query($sql);
        while( $row = $result->fetch_assoc()) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row['dcName']; ?></td>
            <td><?php echo $row['dcDesg']; ?></td>
            <td><?php echo $row['dcDescription']; ?></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>
</body>
</html>