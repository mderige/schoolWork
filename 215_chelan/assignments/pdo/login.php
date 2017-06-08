<?php
	//This version connects to a database, and contains a link to create a new account
	//login.php
	
	session_start();
	
	require_once 'db.php';
	    
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		     
		//Query for user
		$sql = "SELECT userid, username, level FROM tblUsers 
		     WHERE username = :username
		     AND password = :password;";
	   
		$statement = $dbh->prepare($sql);
		
		$hashedPassword = sha1($password);
		$statement->bindParam(":username", $username, PDO::PARAM_STR);
		$statement->bindParam(":password", $hashedPassword, PDO::PARAM_STR); 
		$statement->execute();
		$result=$statement->fetch(PDO::FETCH_ASSOC);
		//print_r($result);
		
		//If user is found
		if($statement->rowCount() >= 1) {
			$_SESSION['username'] = $result['username'];
			$_SESSION['level'] = $result['level'];
			header("location: menu.php?".SID);			
		} else {
			echo "<p>Invalid login. Please try again.</p>";
		}
	}
?>

<h2>Login</h2>

<form name='login' method='post' action=''>
    Username: <input type='text'
	name='username' /><br /><br />
    Password: <input type='password'
	name='password' /><br /><br />
    <input type='submit' name='submit'
	value='Submit'>
</form>
<a href='add_user.php'>Create new account</a>