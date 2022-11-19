<?php 
session_start();
error_reporting(0);
include('Contain/config.php');
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $FirstName=$_POST['firstName'];
    $LastName=$_POST['lastName'];
    $Email=$_POST['email'];
    $Password=md5($_POST['password']);
    $Phone=$_POST['phone'];
    $BirthDate=$_POST['birthday'];

    $query=mysqli_query($con,"insert into customer(username,FirstName,LastName,Email,Password,Phone,BirthDate) values('$username','$FirstName','$LastName','$Email','$Password','$Phone','$BirthDate')");
if($query)
{
	echo "<script>alert('Successfully register! ');</script>";
    header('Location: login.php?register=success');
}
else{
    echo "<script>alert('Not register, please try again');</script>";
}
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <!--CSS -->
    <link rel="stylesheet" href="CSS/page.css">
</head>

<body>
    <?php include('Contain/header.php'); ?>
    <main>
        <div class='start'>
            <div class='container'>
                <div class='row'>
                    <div class='col text-center'>
                        <form action='register.php' method='post' enctype='multipart'>
                            <h1 class='title'>Register</h1>

                            <p class="validation-feedback text-danger" hidden></p>
                            <div class="text_field">
                                <input type="text" id="username" name="username" autocomplete="user-name" required autofocus>
                                <span></span>
                                <label>Username</label>
                            </div>

                            <div class="text_field">
                                <input type="text" id="firstname" name="firstName" autocomplete="first-name" required autofocus>
                                <span></span>
                                <label>First Name</label>
                            </div>

                            <div class="text_field">
                                <input type="text" id="lastname" name="lastName" autocomplete="last-name"required>
                                <span></span>
                                <label>Last Name</label>
                            </div>

                            <div class="text_field">
                                <input type="email" id="email" name="email" autocomplete="e-mail" required>
                                <span></span>
                                <label>Email</label>
                            </div>

                            <div class="text_field">
                                <input type="password" id="password" name="password" autocomplete="new-password" required>
                                <span></span>
                                <label>Password</label>
                            </div>

                            <div class="text_field">
                                <input type="tel" id="phone" name="phone" autocomplete="contact-num" required>
                                <span></span>
                                <label>Phone Number</label>
                            </div>

                            <div class="text_date">
                                <label>Birthday Date</label> 
                                <input type="date"  id="birthday" name="birthday" autocomplete="birth-day" required>
                            </div>

                            <input type="submit" name="submit" class="button-1" value="Sign Up">
                        </form>

                        <div class="signBtn">
                            Already have account?
                            <a href='login.php' class="text-purple text-decoration-none fw-bold"> Sign In</a>
                        </div>

                    </div>
                </div>
            </div>
    </main>
</body>

</html>