<?php
//creating connection with database using function mysqli_connect(here we will pass localhost,username,passowrd which is defalut,and databse name)
$con=mysqli_connect("localhost","root","","signup");
if(mysqli_connect_error())
{
    //if we are facing error while connecting with database then we will use this funtion
    echo "<sript>alert('cannot connect to database')</script>";
    exit();
}
?>