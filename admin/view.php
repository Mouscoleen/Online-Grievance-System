<?php
include '../conn.php';
if(isset($_SESSION["username"]) && isset($_SESSION["userid"]))
{
	
    $userid= $_SESSION['userid']; 
	$login=mysql_fetch_array(mysql_query("select * from admin where admin_id='".$userid."'"));

?>
<?php
if($_REQUEST['x']!="")
{
$query = "select enrollment , name , query , solution from solution where sol_id='".$_REQUEST['x']."'";
$res= mysql_query($query);

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
    <title>Online Greivance System</title>
    
    
</head>
<body>

<nav class="bg-dark text-centre text-info navbar ">
<span class=" text-info"><h2 class="text-centre">Online Grievance System</h2></span>
</nav>
<?php

while($data = mysql_fetch_array($res))
{
    ?>
    
<div id="login" class="login">
      
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
  
                      <form id="login-form" class="form" action=""   method="post">
                          <h3 class=" text-center text-info ">Check Grievance </h3>
                          <div class="form-group">
                              <label for="enrollment" class="text-info">Enrollment:</label><br>
                              <input type="text" name="enrollment" id="enrollment" value="<?= $data['enrollment']?>" class="form-control" readonly>
                          </div>
                          <div class="form-group">
                              <label for="name" class="text-info">Name:</label><br>
                              <input type="text" name="name" id="name" value="<?= $data['name']?>"  class="form-control"readonly>
                          </div>
                          <div class="form-group ">
                                <label for="query" class="text-info">Query:</label><br>
                                <textarea name="query" id="query" cols="10" rows="5" class="form-control" readonly > <?= $data['query']?> </textarea>
                            </div>
                            <div class="form-group ">
                                <label for="solution" class="text-info">Solution:</label><br>
                                <textarea name="solution" id="solution" cols="10" rows="5" class="form-control" readonly> <?= $data['solution']?> </textarea>
                            </div>
                            <button type="button" class="btn btn-info btn-md" onClick="javascript:location.href='../admin/home.php';" >Back To Page</button>
                            <?php
                    }
                            ?>
</body>
</html>
<?php
                }
                ?>
<?php
}
?>

