<?php require('connection.php');
?>
<?php
if (isset($_POST['signup']))
	header('Location:signup.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Account Managment
	</title>
	
<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>


<div class=" heading">
<h4> Covid Udhaar</h4>
</div>

<div class="container">
<ul>
<li> <a href="signup.php"> Sign Up</a></li>
<li> <a href="signin.php"> Sign In</a></li>
<li> <a href="#"> Home </a></li>
</ul>
</div>
<div class=" center">
<h1>Your Digital Account </h1>
<h3>Welcome TO online Digital Account service  </h3>	
<br><br>
<form action=""  method="post">
<input class="button" type="submit" value="Signup" name="signup">
</form>
</div>	


</body>
</html>
