<!--
Maryanne Derige
Date Created or Modified: 2-22-2017
http://chelan.highline.edu/~maryannederige/215/assignments/a6/index.php


Default file for this application's directory. This page contains a form with
an input field that allows a user to enter a phone number. The form validates
the entered phone number and prompts the user if the phone number is validated
or not by displaying an error or success message.



-->
<?php
    /* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
        
    include 'header.php';
    require 'validation.php';
 ?>

<section>
<h2>Phone Checker</h2>
    <p>Enter a 10-digit phone number to find out if it is a valid format.</p><br />   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
			<label>Phone Number:  </label>
			<input type="text" name="phoneNumber"
				   value="<?php if (isset($_POST['submit'])) {echo $phoneNumber;}?>"/>
			<br />       
			<span class="error"><?php echo $error; ?></span>
			<br /><br />
			<input type="submit" name="submit" value="go!" />
			<br /><br />
			<span class="success"><?php echo $success; ?></span>
		</fieldset>	
    </form>
 </section>   

 <?php include 'footer.php'; ?>