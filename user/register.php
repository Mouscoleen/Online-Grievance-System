<?php
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="style.css">
    <title>Students Grievance Form</title>
    <script>

    function validate()
    {
			msg="";
			if(document.getElementById("username").value.trim()=="")
			{
				msg = msg+"Please Enter Username.\n";
			}
			if(document.getElementById("password").value.trim()=="")
			{
				msg = msg+"Please Enter Password.\n";
			}
			if(document.getElementById("enrollment").value.trim()=="")
			{
				msg = msg+"Please Enter Your Enrollment No.\n";
			}
			if(document.getElementById("name").value.trim()=="")
			{
				msg = msg+"Please Enter Your Name.\n";
			}
			if (document.getElementById('email').value.trim() == '') {
            msg = msg+ "Email address is required.\n";
		}
		else  
		{
			var x = document.getElementById('email').value.trim();
			var atpos = x.indexOf("@");
			var dotpos = x.lastIndexOf(".");
			if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) 
            msg = msg+"Invalid email address.\n";
		}
        
        if(document.getElementById("phone").value.trim() =="")
        {
            msg = msg+"Phone number is required\n";   
        }
        else if(isNaN(document.getElementById("phone").value))
        {
            msg = msg+"Phone number is in Numeric\n";  
        }

        if (document.getElementById('programme').value.trim() == '') {
            msg = msg+ "Select Your Programme.\n";
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

    </nav>

	<div id="login" class="login" onSubmit="return validate();">
      
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
	
                        <form id="login-form" class="form" action=""   method="post">
                            <h3 class=" text-center text-info ">Student Information</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Enrollment No:</label><br>
                                <input type="text" name="enrollment" id="enrollment" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Name" class="text-info">Name:</label><br>
                                <input type="text" name="name" id="name"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Name" class="text-info">Phone No:</label><br>
                                <input type="text" name="phone" id="phone"  class="form-control">
                            </div>
                            <div class="form-group">
							<label for="Name" class="text-info">Programme:</label><br>
                            <select name="programme" id="programme" class="form-control">  
									<option value="">Select Programme</option>  
									<option value="BCA">BCA</option>  
									<option value="MCA">MCA</option>  
									<option value="BA">BA</option>  
									<option value="MA">MA</option>  
									<option value="BCA">PGDMA</option>  
									<option value="MCA">BSC</option>  
									<option value="BA">PHD</option>  
									<option value="MA">B.Ed</option>  
									<option value="BCA">M.Ed</option>  
									<option value="MCA">M.Sc</option>  
									  
									  
									</select>
								
				 
                            </div>
                            
                            <input type="submit" class="btn btn-info btn-md"  name="submit" id="submit" value="Save"/>
							<button type="button" class="btn btn-info btn-md" onClick="javascript:location.href='../index.php';" >Back To Page</button>
						</form>
		
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>  
 
  </html> 
  <?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && $_REQUEST['submit']=='Save')
	{   
        
		$query="insert into student set enrollment='".trim($_REQUEST['enrollment'])."',name='".trim($_REQUEST['name'])."',email='".trim($_REQUEST['email'])."',phone='".trim($_REQUEST['phone'])."',programme='".trim($_REQUEST['programme'])."',username='".trim($_REQUEST['username'])."',password='".trim($_REQUEST['password'])."'";
		
		$result=mysql_query($query);
       
		
		if($result)
		{
			
			echo "<script>alert('Your Userid Generated');location.href='login.php';</script>";
		}
		else
		{
			echo "<script>alert('Request not Completed...');location.href='';</script>";
		}
	}
?>



  


		