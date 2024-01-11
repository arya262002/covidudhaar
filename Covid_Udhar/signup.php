<?php 
//agar ma submit button pr click kr rha hu then
require('connection.php');

//for signup
if(isset($_POST['submit']))
{
    //so phle me check krunga ki koi user to nhi ha jo same name se register ho
    $user_exit_query="SELECT * FROM `signin` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    //now we have to fire query
    $result=mysqli_query($con,$user_exit_query);
    if($result)
    {
      //agar hmari query chali ha then then hm count krenge kitne no of rows fetch hui ha using mysqli_num_rows
      if(mysqli_num_rows($result)>0)
      {
        // it means ki username or email already present ha to yha pr hm mysqli_fetch_assoc function ka use krnege jo output dega associative array ki form me
        $result_fetch=mysqli_fetch_assoc($result);
        if($result_fetch['username']==$_POST['username'])
        {
            // yaha pr agar username se ha
            echo"
            <script>
             alert('$result_fetch[username] - Username is already taken');
             window.location.href='home.php';
            </script>
            ";
        }
        else
        {
            //yaha pr agar email same ha to registerd user se
            echo"
            <script>
             alert('$result_fetch[email] - E-mail is already taken');
             window.location.href='home.php';
            </script>
            ";
        }

      }
      else
      {
        //user present nhi ha to yha pr ab user sign up krega
        // here we are encrypting password
        $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $query="INSERT INTO `signin` (`username`, `email`, `password`) VALUES ('$_POST[username]', '$_POST[email]', '$password')";
        if(mysqli_query($con,$query))
        {
           // eska mtlab ha ki data inserted hogya ha succefully
           echo"
           <script>
            alert('Signup Succesfull Now Login');
            window.location.href='signin.php';
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
        alert('Cannot Run Query');
        window.location.href='home.php';
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
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/d6a3e564e8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
       <div class="form-box">
        <h1 id="title">Sign Up</h1>
        <form method="POST" action="signup.php">
            <div class="input-group">
                <div class="input-field">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <button type="submit" class="new" name="submit">Submit</button>
            </div>
            
            <div class="btn-field">
                <button type="button" id="signupBtn" name="signup">Sign up</button>
                <button type="button" class="disable" id="signinBtn">Sign in</button>
            </div>
        </form>
       </div>
    </div>
<script>

    let signinBtn = document.getElementById("signinBtn");
    let signupBtn = document.getElementById("signupBtn");
    // let name = document.getElementById("nameField");
    let title = document.getElementById("title");

    // Get the current page filename (excluding the extension)
    let currentPage = location.pathname.split('/').pop().replace(/\.[^/.]+$/, '');

    // Function to highlight the active button
    function highlightActiveButton() {
        if (currentPage === 'signup') {
            // name.style.maxHeight = "60px";
            title.innerText = "Sign Up";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
        } else if (currentPage === 'signin') {
            // name.style.maxHeight = "0";
            title.innerText = "Sign In";
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
        }
    }

    // Call the function to highlight the active button
    highlightActiveButton();

    signinBtn.onclick = () => {
        // name.style.maxHeight = "0";
        title.innerText = "Sign In";
        signupBtn.classList.add("disable");
        signinBtn.classList.remove("disable");

        setTimeout(() => {
            window.location.href = 'signin.php';
        }, 500); // Delay the redirect for 500 milliseconds (adjust as needed)
    }

    signupBtn.onclick = () => {
        // name.style.maxHeight = "60px";
        title.innerText = "Sign Up";
        signupBtn.classList.remove("disable");
        signinBtn.classList.add("disable");

        setTimeout(() => {
            window.location.href = 'signup.php';
        }, 500); // Delay the redirect for 500 milliseconds (adjust as needed)
    }
</script>
</body>
</html>