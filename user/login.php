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
   
    .login
    {
    
        position: absolute;
        top:20%;
        left:35%;
        
     
    }
    #username, #password
    {
        width:20rem;
        position: relative;
        left:-60%;
    }
    .login
    {
        
        padding:10px;
        box-shadow:
    }
    .btn
    {
        margin-top:10px;
    }
   
    
</style>

</head>
<body>
    


<!------ Include the above in your HEAD tag ---------->


    <div id="login" class="login shadow-lg p-3 mb-5 bg-white rounded" onSubmit="return valid();">
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info ">Student Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                          
                                <input type="submit" name="submit" id="btn" class="btn btn-info btn-md" value="submit" >
                                <button type="button" class="btn btn-info btn-md" onClick="javascript:location.href='../user/logout.php';" >Back To Page</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
            function valid()
            {
                msg="";
                if(document.getElementById("username").value.trim()=="")
                {
                    msg=msg+"Please Enter Username.\n";
                }
                if(document.getElementById("password").value.trim()=="")
                {
                    msg=msg+"Please Enter Password.\n";
                }
                if(msg!="")
                {
                    alert(msg);
                    return false;
                }
                else
                {
                    return true;
                }
            }
        </script>
</html>


<?php
 if($_SERVER['REQUEST_METHOD']=='POST' && $_REQUEST['username']!='') {
	
	$result=mysql_query("select * from student where username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."' ");
	$data=mysql_fetch_array($result);
   
	if($data['username']!='' && $data['stud_id']!='')
	{
		$_SESSION['username']=$data['username'];
		$_SESSION['userid']=$data['stud_id'];
				
        echo "<script>location.href='student.php';</script>";
	}
	else
	{
		echo '<script>alert("Invalid Username/Password...");document.location="";</script>';
	}
}
 ?>