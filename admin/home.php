<?php
include '../conn.php';
if(isset($_SESSION["username"]) && isset($_SESSION["userid"]))
{
	$userid= $_SESSION['userid']; 
	$login=mysql_fetch_array(mysql_query("select * from admin where admin_id='".$userid."'"));

?>
<?php
$sql = "select * from grievance order by id";
$res = mysql_query($sql);
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
</head>
<body>
<nav class="bg-dark text-centre text-info navbar ">
<span class=" text-info"><h2 class="text-centre">Online Grievance System</h2></span> 
<button class="btn btn-light" onClick="javascript:location.href='./logout.php';">Logout</button>
    </nav>

	<div id="login" class="login">
      
        <div class="container">
            <div id="login-row" >
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <div class="table-responsive-sm float-left">
    <table class="table table-bordered table-hover " >
        <tr>
            <td>S.no</td>
            <td>Enrollment No</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Programme</td>
            <td>Regional Center</td>
            <td>Query</td>
            <td>Status</td>
            <td>Action</td>
            
        </tr>
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
                    <td><?= $data['email'];?></td>
                    <td><?= $data['phone'];?></td>
                    <td><?= $data['programme'];?></td>
                    <td><?= $data['rc'];?></td>
                    <td><?= $data['query'];?></td>
                    
                    <td>
                    <?php if($data['status']=="P")
                    {echo "<button class=' btn btn-danger '>Pending</button>
                   ";} 
                   else{
                    echo  "<button class=' btn btn-success '>Replied</button>
                    ";}
                    ?>
                   </td>
                  
                   <td><?php if($data['action']=="R")
                      { 
                        ?>
                    <button class='btn btn-info' onclick='location.href="manage.php?x=<?=$data['id']?>"'>Reply</button>
                        <?php
                        }
                        else{
                            ?>
                             <button class= "btn btn-dark" onclick='location.href="./view.php?x=<?=$data['id']?>"'><span class='bi bi-eye' style='color: blue'></span>View</button>
                        
                        <?php    }
                         ?>
                   </td>
                        
         
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