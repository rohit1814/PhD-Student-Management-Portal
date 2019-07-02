<?php session_start()?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=user_accounts", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
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

<h1>Result</h1>

<div>
<?php
// code Student Data
$rollid=$_POST['rollid'];
$classid=$_POST['class'];
$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$qery = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid ";
$stmt = $conn->prepare($qery);
$stmt->bindParam(':rollid', $rollid,PDO::PARAM_STR);
$stmt->bindParam(':classid', $classid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
<p><b>Student Name :</b> <?php echo htmlentities($row->StudentName);?></p>
<p><b>Student Roll Id :</b> <?php echo htmlentities($row->RollId);?>
<p><b>Student Class:</b> <?php echo htmlentities($row->ClassName);?>(<?php echo htmlentities($row->Section);?>)
<?php }?>
</div>

<div>
    <table id="dctable">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Marks</th>
        </tr>
    </thead>
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        
<?php                                              
// Code for result
$query ="select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
$query= $conn -> prepare($query);
$query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 

foreach($results as $result){?>

        <tr>
            <th scope="row"><?php echo htmlentities($cnt);?></th>
            <td><?php echo htmlentities($result->SubjectName);?></td>
            <td><?php echo htmlentities($totalmarks=$result->marks);?></td>
        </tr>
    <?php 
    $totlcount+=$totalmarks;
    $cnt++;}?>

    <tr>
        <th scope="row" colspan="2">Total Marks</th>
            <td><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
    </tr>
    
    <tr>
        <th scope="row" colspan="2">Percntage</th>           
            <td><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
    </tr>
    <?php } else { ?> 
        <div class="alert alert-warning left-icon-alert" role="alert">
            <strong>Notice!</strong> Your result not declare yet
    <?php }?>
        </div>
    <?php } else{?>
        <div class="alert alert-danger left-icon-alert" role="alert">
            <strong>Oh snap!</strong>
    <?php
        echo htmlentities("Invalid Roll Id");
    }?>

        </div>
    </tbody>
</table>
</body>
</html>