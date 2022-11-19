<?php
session_start();
include('Contain/config.php');

// Code for User login
if(isset($_POST['login'])){
   $Email=$_POST['email'];
   $Password=md5($_POST['password']);
   $query=mysqli_query($con,"SELECT * FROM customer WHERE email='$Email' and password='$Password'");
   $number=mysqli_fetch_array($query);
if($number>0)
{
   $extra="cart.php";
   $_SESSION['login']=$_POST['email'];
   $_SESSION['id']=$num['id'];
   $_SESSION['username']=$num['name'];
   $uip=$_SERVER['REMOTE_ADDR'];
 
   $_SESSION['status'] = "Login Successfully";
   $host=$_SERVER['HTTP_HOST'];
   $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
   header("location:http://$host$uri/$extra");
   exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$_SESSION['status'] = "Login Fail";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page </title>
    <!----CSS--->
    <link rel="stylesheet" href="CSS/page.css" />
    <!-- Aler -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php include('Contain/header.php'); ?>
    <div class='login'>
        <div class="all">
            <div class="me-container">
                <div class="row ">
                    <div class="col text-center mx-auto">
                        <form action="login.php" method="post" enctype="multipart/form-data">
                            <h1 class='title'>Sign In</h1>

                            <p class="validation-feedback text-danger" hidden></p>
                            <div class="text_field_login">
                                <input type="email" id="email" name="email" required autofocus>
                                <span></span>
                                <label>Email</label>
                            </div>

                            <div class="text_field_login">
                                <input type="password" id="password" name="password" autocomplete="new-password"
                                    required>
                                <span></span>
                                <label>Password</label>
                            </div>

                            <input type="submit" name="login" class="button-1" value="Sign In">

                        </form>    
                        <?php                             
                            if(isset($_SESSION['status']))
                            {
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Hey !</strong> <?= $_SESSION['status']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php 
                                unset($_SESSION['status']);
                            }

                        ?>   

                        <div class="signBtn">
                            Not a member ?
                            <a href="register.php" class="text-purple text-decoration-none fw-bold"> Sign Up </a>
                        </div>

                        <div class="forgetBtn">
                            <a href="forget.php" class="text-purple text-decoration-none fw-bold">Forget Password </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('Contain/footer.php'); ?>
</body>

</html>