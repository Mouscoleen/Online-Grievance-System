<?php
include '../conn.php';
if(isset($_SESSION["username"]) && isset($_SESSION["userid"]))
{
	$userid= $_SESSION['userid']; 
	$login=mysql_fetch_array(mysql_query("select * from student where stud_id='".$userid."'"));

?>


<?php
$query = "select * from student where stud_id='".$userid."' order by stud_id ";
$res= mysql_query($query);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="style.css">
    <title>Students Grievance Form</title>
	<style>
		.h3{
			margin-top:20px;
		}
		.for
		{
			position: absolute;
			top:20%;
			right:10%;
			padding:10px;

		}
		.btn{
			margin-top:10px;
		}
	</style>
    <script>
    function valid()
    {
			msg="";
			if(document.getElementById("rc").value.trim()=="")
			{
				msg = msg+"Please Select Regional Center\n";
			}
			if(document.getElementById("query").value.trim()=="")
			{
				msg = msg+"Please Raise Your Query\n";
			}
			if(msg!="")
			{
				alert(msg);
				return false;
			}
			else{
				return true;
			}
        
    }
</script>

</head>
<body>



 <nav class="bg-dark text-centre text-info navbar ">
<span class=" text-info"><h2 class="text-centre">Online Grievance System</h2></span> 
<button class="btn btn-light" onClick="javascript:location.href='./logout.php';">Logout</a></button>
    </nav>

	<div id="login" class="login shadow-lg   bg-white rounded">
      
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center d-block">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
					<?php
					$i=0;
					while($data = mysql_fetch_array($res))
					{
						?>
                        <form id="login-form" class="form" action="" onSubmit="return valid();" method="post">
                            <h3 class="  h3 text-center  text-info ">Student Information</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Enrollment No:</label><br>
                                <input type="text" value="<?= $data['enrollment']?>" name="enrollment" id="enrollment" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Name" class="text-info">Name:</label><br>
                                <input type="text" name="name" id="name" value="<?= $data['name']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" value="<?= $data['email']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Name" class="text-info">Phone No:</label><br>
                                <input type="text" name="phone" id="phone" value="<?= $data['phone']?>" class="form-control">
                            </div>
                            <div class="form-group">
							<label for="Name" class="text-info">Programme:</label><br>
								<input type="text" name="programme" value="<?= $data['programme']?>" class="form-control">
								<div class="form-group">
								<label for="RC" class="text-info">RC:</label><br>

                                <select name="rc" id="rc" class="form-control">  
									<option value="">Select RC</option>  
									<option value="Rc-1">Delhi-1</option>  
									<option value="Rc-2">Delhi-2</option>  
									<option value="Rc-3">Delhi-3</option>  
									  
									</select>  
                            </div>
                            <div class="form-group ">
                                <label for="Name" class="text-info">Query:</label><br>
                                <textarea name="query" id="query" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group ">
                            
                                <input type="hidden" name="status" id="status" value="P" >
                            </div>
                            <div class="form-group ">
                            
                                <input type="hidden" name="action" id="action" value="R" >
                            </div>
                          
                                <input type="submit" name="submit" id="btn" class="btn btn-info btn-md" value="Save">
								<button type="button" class="btn btn-info btn-md" onClick="javascript:location.href='../index.php';" >Back To Page</button>
								
								
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
	


			</form>
			</div>
  </body>  
 
  </html>  
  <?php 
}
else 
	
{
	print"<script>alert('Login Please!');document.location='login.php';</script> ";
}
?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && $_REQUEST['submit']=='Save')
	{   
        
		$query="insert into grievance set enrollment='".trim($_REQUEST['enrollment'])."',name='".trim($_REQUEST['name'])."',email='".trim($_REQUEST['email'])."',phone='".trim($_REQUEST['phone'])."',programme='".trim($_REQUEST['programme'])."',rc='".trim($_REQUEST['rc'])."',query='".trim($_REQUEST['query'])."',status='P',action='R'";
		
		$result=mysql_query($query);
       
		
		if($result)
		{
			
			echo "<script>alert('your grievance succesfully Submit');location.href='student.php';</script>";
		}
		else
		{
			echo "<script>alert('Request not Completed...');location.href='';</script>";
		}
	}
?>


		