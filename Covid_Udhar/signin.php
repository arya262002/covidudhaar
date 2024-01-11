<?php 
//agar ma submit button pr click kr rha hu then
require('connection.php');
//for login
if(isset($_POST['submit']))
{
    $query="SELECT * FROM `signin` WHERE `email`= '$_POST[email]' and `username`= '$_POST[username]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        //query chal rhi ha
        if(mysqli_num_rows($result)==1)
        {
          $result_fetch=mysqli_fetch_assoc($result);
          //here query is running fine now we want to check password and for that use password_verify function
          // if function me hm do chiz pass krte ha ek to user ne jo pasword dala ha and ek jo passowrd backend me ha vo hm fetch krenge result fetch me
          if(password_verify($_POST['password'],$result_fetch['password']))
          {
            // if pasword matched
            echo"
            <script>
            alert('correct Password');
            window.location.href='register.php';
            </script>
            ";
          }
          else
          {
            // if incorrect password
        echo"
        <script>
        alert('Incorrect Password');
        window.location.href='signin.php';
        </script>
        ";
          }
        }
        else
        {
        echo"
        <script>
        alert('Email or Username is not Registered Please Signup First');
        window.location.href='signup.php';
        </script>
        ";
        }
    }
    else
    {
        //query is not working
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
        <h1 id="title">Sign In</h1>
        <form method="POST" action="signin.php">
            <div class="input-group">
                <div class="input-field">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="input-field" >
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="input-field"  >
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