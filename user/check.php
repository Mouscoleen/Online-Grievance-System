<?php include_once '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
      .btn{
        margin-top:10px;
      }
    </style>
  </head>
<body>
<nav class="bg-dark text-centre text-info navbar ">
<span class=" text-info"><h2 class="text-centre">Online Grievance System</h2></span> 
    </nav>

<div class="container">
  <h2>Track Your Greivance</h2>

 
    <div class="form-group">
    <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                  <form id="login-form" class="form" action="" method="post">
        <label for="enrollment" class="text-info">Enrollment:</label><br>
      <input type="text" name="enrollment" id="enrollment" class="form-control">
  </div>
  <button type="button" class="btn btn-info btn-lg"> track</button>
</div>
</div>
</div>
  
</form>
  </div>
  
</div>

</body>
</html>
<?php
 if($_SERVER['REQUEST_METHOD']=='POST' && $_REQUEST['enrollment']!='') {
	
	$result=mysql_query("select name,enrollment,query,solution from solution where enrollment='".$_REQUEST['enrollment']."' ");
	$data=mysql_fetch_array($result);
   
	if($data['enrollment']!='')
	{
		$_SESSION['enrollment']=$data['enrollment'];
	
				
        echo "<script>location.href='./view.php';</script>";
	}
	else
	{
		echo '<script>alert("Invalid Enrollment");document.location="";</script>';
	}
}
 ?>
