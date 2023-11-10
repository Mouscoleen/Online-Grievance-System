<?php
include_once '../conn.php';
if(isset($_SESSION["enrollment"]))
{
	$enrollment= $_SESSION['enrollment']; 
	$login=mysql_fetch_array(mysql_query("select * from solution where enrollment='".$enrollment."'"));

?>
<?php

$sql = "select enrollment , name , query , solution from solution where enrollment='".$enrollment."'";
$res  = mysql_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <title>Document</title>
    <style>
        .table
        {
            padding:12px;
        }
    </style>
</head>
<body>
<nav class="bg-dark text-centre text-info navbar ">
<span class=" text-info"><h2 class="text-centre">Online Grievance System</h2></span> 
<button class="btn btn-light" onClick="javascript:location.href='./logout.php';">Logout</button>
    </nav>
      
        <div class="container">
            

                        <div class="table-responsive-sm table">
    <table class="table table-bordered table-hover " >
        <thead class="table-dark">
        <tr>
            <td>S.no</td>
            <td>Enrollment No</td>
            <td>Name</td>
            <td>Query</td>
            <td>Solution</td>
            
            
        </tr>
    </thead>
        <tbody>
            <?php
            $i=0;
            while($data = mysql_fetch_array($res))
            {
                ?>
                <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $data['enrollment'];?></td>
                    <td><?= $data['name'];?></td>
                    <td><?= $data['query'];?></td>
                    <td><?= $data['solution'];?></td>
                    
         
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
<?php
}
else 
	
{
	print"<script>alert('Login Please!');document.location='index.php';</script> ";
}