<?php

if(isset($_POST['form_login'])) 
{
	
		try {
	
		
		if(empty($_POST['username'])) {
			throw new Exception('Username can not be empty');
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
		}
	
		
		$password = $_POST['password'];
		$password = md5($password);
	
	
		include('../config.php');
		$num=0;
				
		$statement = $db->prepare("select * from login where username=? and password=?");
		$statement->execute(array($_POST['username'],$password));		
		
		$num = $statement->rowCount();
		
		if($num>0) 
		{
			session_start();
			$_SESSION['name'] = "Rajwan";
			header("location: admin.php");
		}
		else
		{
			throw new Exception('Invalid Username and/or password');
		}
	
	
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	

}

?>
<html lang = "eng">

<head>
<title>
My first web</title>
<link href="style.css"  rel="stylesheet"  type="text/css"/>
</head>
<body>
<CENTER>
<h2> Log in to System.</h2>

<?php
if(isset($error_message))
{
	echo  "<div class=' '>".$error_message."</div";
}
?>
<br>
<form action ="" method = "post">
<div class="head">
<p>
<td>UserName:</td>
<td> <input type = "text" name = "username">
</td>

</p>

<p>
<td>Password:</td>
<td> <input type = "password" name = "password">
</td>

</p>
<p>
<input type = "submit" value="Login" name = "form_login">
</p>

</CENTER>
</form>
</div>
</body>


</html>
