<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php'); include('../config.php');
include('../config.php');

function is_email($email){
    if(preg_match("/[w\.\_\-]+@\w+\.[a-z]{2,5}/i", $email) == 0) return false;
    return true;
}

if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $cid=$_POST['cid'];
    $rollnum=$_POST['rollnum'];
    $password=md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);



    $ret="select Email,MobileNumber,RollNumber from tbluser where Email=:email || MobileNumber=:mobno || RollNumber=:rollnum ";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
    $query->bindParam(':rollnum',$rollnum,PDO::PARAM_INT);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0 )
{
$sql="insert into tbluser(FullName,MobileNumber,Email,Cid,RollNumber,Password)Values(:fname,:mobno,:email,:cid,:rollnum,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':cid',$cid,PDO::PARAM_INT);
$query->bindParam(':rollnum',$rollnum,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{

echo "<script>alert('You have successfully registered with us');</script>";
echo "<script>window.location.href ='login.php'</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{
echo "<script>alert('Email-id or RollNumber or Mobile Number is already exist. Please try again');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
     <script>
        function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("confirmpassword").value;
            if (a!=b) {
               alert("Passwords do not match!");
               return false;
            }

            var c = document.getElementById("email").value;
            var d = document.getElementById("confirmemail").value;
            if (c!=d) {
               alert("Email addresses do not match!");
               return false;
            }
        }
     </script> 
    <title>FIEK | Student Signup</title>

    <!-- Styles -->
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css?v=<?=$version?>?v=<?=$version?>" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#"><span>Student Sign Up</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Register to FIEK</h4>
                            <form method="post" onsubmit="return validate()">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="" name="fname" required="true" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobno" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" value="" name="email" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Email address</label>
                                    <input type="email" class="form-control" value="" name="confirmemail" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Roll Number</label>
                                    <input type="text" value="" name="rollnum" required="true" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Course</label>
                                    <select type="text" value="" name="cid" required="true" class="form-control">
                                        <option value="">Select Course</option>
                                        <?php
                                          
$sql="SELECT * from tblcourse";

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{            


   ?>
                                       <option value="<?php  echo $row->ID;?>"><?php  echo htmlentities($row->CourseName);?>(<?php  echo htmlentities($row->BranchName);?>)</option><?php $cnt=$cnt+1;}} ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" value="" class="form-control" pattern=".{8,}" name="password" required="true">
                                    <label>Confirm password</label>
                                    <input type="password" id="confirmpassword" value="" class="form-control" name="confirmpassword" required="true">
                                </div>
                               
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="submit">Register</button>
                               
                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? <a href="login.php"> Sign in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
