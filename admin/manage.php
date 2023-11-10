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
$query = "select * from grievance where id='".$_REQUEST['x']."' order by id ";
$res= mysql_query($query);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
    <title>Students Grievance </title>
  

</head>
<body>



 <nav class="bg-dark text-centre text-info navbar ">
<span class=" text-info"><h2 class="text-centre">Online Grievance System</h2></span> 
<a href="./logout.php"> <button class="btn btn-light">Logout</button></a>
    </nav>

	<div id="login" class="login">
      
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
					<?php
					$i=0;
					while($data = mysql_fetch_array($res))
					{
						?>
                        <form id="login-form" class="form" action="" onSubmit="return valid();" method="post">
                            <h3 class=" text-center text-info ">Student Greivance</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Enrollment No:</label><br>
                                <input type="text" value="<?= $data['enrollment']?>" name="enrollment" id="enrollment" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="name" class="text-info">Name:</label><br>
                                <input type="text" name="name" id="name" value="<?= $data['name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" value="<?= $data['email']?>" class="form-control">
                             </div>
                                
                            <div class="form-group">
                                <label for="Name" class="text-info">Query:</label><br>
                                <textarea name="query" id="query" cols="10" rows="5" class="form-control"><?= $data['query']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Name" class="text-info">Solution:</label><br>
                                <textarea name="solution" id="solution" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                          
                                <input type="submit" name="submit" id="btn" class="btn btn-info btn-md" value="Save">
                                <button type="button" class="btn btn-info btn-md" onClick="javascript:location.href='./home.php';" >Home Page</button>
                            </div>
                           
                        </form>
						<?php
		}
		?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>  
 
  </html>  
  <?php 
}
?>

<?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && $_REQUEST['submit']=='Save')
	{   
        
		$query="insert into solution set enrollment='".trim($_REQUEST['enrollment'])."',name='".trim($_REQUEST['name'])."',email='".trim($_REQUEST['email'])."',status='A',query='".trim($_REQUEST['query'])."',solution='".trim($_REQUEST['solution'])."'";
		
		$result=mysql_query($query);
        
       
		
		if($result)
		{
			
            $query="update grievance set status='A',action='V' ";
		    $result=mysql_query($query);
            echo "<script>alert('Solution Has Been Submitted');location.href='home.php';</script>";

		}
		else
		{
			echo "<script>alert('Request not Completed...');location.href='';</script>";
		}
	}
?>
<?php
}
else
{
	print"<script>alert('Login Please!');document.location='index.php';</script> ";
}