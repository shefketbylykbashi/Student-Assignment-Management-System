<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php'); include('../config.php');
include('../config.php');

if(isset($_POST['login'])) 
  {
    $rollmobilenum=$_POST['rollmobilenum'];
    $mobnum=$_POST['mobnum'];
    $password=md5($_POST['password']);
    // $sql ="SELECT RollNumber,MobileNumber,Password,ID,Cid FROM tbluser WHERE (RollNumber=:rollmobilenum || MobileNumber=:rollmobilenum) and Password=:password";
    $sql ="SELECT RollNumber,MobileNumber,Password,ID,Cid FROM tbluser WHERE (RollNumber= '$rollmobilenum' || MobileNumber= '$rollmobilenum') and Password='$password' ";
    $query=$dbh->prepare($sql);
//     $query->bindParam(':rollmobilenum',$rollmobilenum,PDO::PARAM_STR);
//     $query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
// $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['ocasuid']=$result->ID;
$_SESSION['ocasucid']=$result->Cid;
}

if(!empty($_POST["remember"])) {
    //COOKIES for username
    setcookie ("student_login",$_POST["rollmobilenum"],time()+ (365 * 24 * 60 * 60));
    //COOKIES for password
    setcookie ("studentpassword",$_POST["password"],time()+ (365 * 24 * 60 * 60));
    } else {
    if(isset($_COOKIE["student_login"])) {
    setcookie ("student_login","");
    if(isset($_COOKIE["studentpassword"])) {
    setcookie ("studentpassword","");
            }
          }}

$_SESSION['login']=$_POST['rollmobilenum'];

echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>FIEK | Student Login</title>
    
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
                            <a href="../index.php"><span>Login as STUDENT</span></a>
                        </div>
                        <div class="login-form">
                            <h4>User Login</h4>
                            <form method="post">
                            <div class="form-group">
                                    <label>Student ID</label>
                                    <input type="text" class="form-control" placeholder="Student ID" required="true" name="rollmobilenum" value="<?php if(isset($_COOKIE["student_login"])) { echo $_COOKIE["student_login"]; } ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required="true" value="<?php if(isset($_COOKIE["studentpassword"])) { echo $_COOKIE["studentpassword"]; } ?>">
                                </div>
                                <div class="checkbox">
                                    <label>
										<input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["student_login"])) { ?> checked <?php } ?>> Remember Me
									</label>
                                    <label class="pull-right">
										<a href="forgot-password.php">Forgot Password?</a>
									</label>
                                  

                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>

                                <div class="register-link m-t-15 text-center">
                                    <p>Create an account ? <a href="signup.php"> Sign up</a></p>
                                </div>
                                <label>
                                        <a href="../index.php">Go to HomePage</a>
                                    </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>