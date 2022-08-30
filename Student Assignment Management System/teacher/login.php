<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php'); include('../config.php');
include('../config.php');

if(isset($_POST['login'])) 
  {
    $empid=$_POST['empid'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID,EmpID,CourseID FROM tblteacher WHERE EmpID=:empid and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':empid',$empid,PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['ocastid']=$result->ID;
$_SESSION['ocasteaid']=$result->EmpID;
$_SESSION['ocastcid']=$result->CourseID;
}

if(!empty($_POST["remember"])) {
    //COOKIES for username
    setcookie ("teacher_login",$_POST["empid"],time()+ (365 * 24 * 60 * 60));
    //COOKIES for password
    setcookie ("teacherpassword",$_POST["password"],time()+ (365 * 24 * 60 * 60));
    } else {
    if(isset($_COOKIE["teacher_login"])) {
    setcookie ("teacher_login","");
    if(isset($_COOKIE["teacherpassword"])) {
    setcookie ("teacherpassword","");
            }
          }}

$_SESSION['login']=$_POST['empid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>FIEK |  Teacher Login</title>
    
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
                            <a href="../index.php"><span>Login as TEACHER</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Teacher Login</h4>
                            <form method="post">
                            <div class="form-group">
                                    <label>Teacher ID</label>
                                    <input type="text" class="form-control" placeholder="Teacher ID" required="true" name="empid" value="<?php if(isset($_COOKIE["teacher_login"])) { echo $_COOKIE["user_login"]; } ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required="true" value="<?php if(isset($_COOKIE["teacherpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                                </div>
                                <div class="checkbox">
                                    <label>
										<input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["teacher_login"])) { ?> checked <?php } ?>> Remember Me
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