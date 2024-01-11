<?php
require('connection.php');
if(isset($_POST['register']))
{
    $user_exit_query="SELECT * FROM `register` WHERE `username`='$_POST[username]'";
    $result=mysqli_query($con,$user_exit_query);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
         //find logic to update the details
        }
        else
        {
           $query="INSERT INTO `register` (`name`, `username`, `phone`, `addhar`, `amt`, `paid`) 
           VALUES ('$_POST[name]', '$_POST[username]', '$_POST[phone]', '$_POST[addhar]', '$_POST[amt]', '$_POST[paid]')";
           if(mysqli_query($con,$query))
           {
              // eska mtlab ha ki data inserted hogya ha succefully
              echo"
              <script>
               alert('You are successfully registered');
               window.location.href='disp.php';
              </script>
              ";
           }
           else
           {
               echo"
               <script>
                alert('Cannot run query');
                window.location.href='signup.php';
               </script>
               ";
           }
        }
    }
    else
    {
        echo"
        <script>
         alert('Data is not submitted try again');
         window.location.href='register.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="left-section">
        <h1>USER REGISTRATION FORM</h1>
    </div>
    <div class="container">
        <form action="" method="post">
            <h2>Registration</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">Full Name</label>
                    <input type="text" placeholder="Enter Your Full Name" name="name">
                </div>
                <div class="input-box">
                    <label for="name">Username</label>
                    <input type="text" placeholder="Enter Your Username" name="username">
                </div>
                <div class="input-box">
                    <label for="name">Phone No</label>
                    <input type="phone" placeholder="Enter Your Phone no" name="phone">
                </div>
                <div class="input-box">
                    <label for="name">Addhar Id</label>
                    <input type="text" placeholder="Enter Your Addhar" name="addhar">
                </div>
                <div class="input-box">
                    <label for="name">Amount Borrowed</label>
                    <input type="text" placeholder="Amount Borrowed" name="amt">
                </div>
                <div class="input-box">
                    <label for="name">Amount Paid</label>
                    <input type="text" placeholder="Amount Paid" name="paid">
                </div>
                <span class="gender-title">Gender</span>
                <div class="gender-category">
                    <input type="radio" name="gender" id="male">
                    <label for="gender">Male</label>
                    <input type="radio" name="gender" id="female">
                    <label for="gender">Female</label>
                    <input type="radio" name="gender" id="other">
                    <label for="gender">Other</label>
                </div>
            </div>
            <div class="alert">
               <p>By clicking Sign Up, you are agree to our <a href="#">Terms,</a> <a href="#">Privacy Policy</a>  and Cookies Policy. You may recive
                notification from us and can opt out at any time.
               </p>
            </div>
            <div class="button-container">
                <button type="submit" name="register">Register</button>
            </div>
        </form>
    </div>
</body>
</html>