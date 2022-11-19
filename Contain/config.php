<?php
define('Server','localhost');
define('User','root');
define('Password' ,'');
define('Name', 'ecom_website');
$con = mysqli_connect(Server, User, Password, Name);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>