<!--
Maryanne Derige
Date Created or Modified: 2-22-2017
http://chelan.highline.edu/~maryannederige/215/assignments/a6/validation.php


This file validates the users input value from the phone number field. The
phone number is matched against a regular expression that only allows the
following formats.

xxxxxxxxxx 
xxx-xxx -xxxx 
xxx.xxx.xxxx 
(xxx) xxx – xxxx

It’s valid if the user puts in one period and one hyphen, but it’s
one or the other for each spot:
xxx.xxx-xxxx

-->
<?php
	/* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
	
	//print "<pre>";
	//print_r($_POST);
	//print "</pre>";

//Initialize local variables
$phoneNumber = "";
$error = "";
$success = "";

//Check if data was submitted in the $_POST
if (isset($_POST['submit'])) {
    //Check if phone number is empty. If empty display error.
    if (empty($_POST['phoneNumber'])) {
        $error = "*Please enter a phone number";
    } else {
		//If user entered value, get value from $_POST and validate.
        $phoneNumber = filter_input(INPUT_POST, 'phoneNumber');
        $phoneNumber = strip_tags($phoneNumber);
        $phoneNumber = trim($phoneNumber);
		//Regex that matches formats in file description above.
        $validPhoneNumber = '/^ ?(\( ?\d{3} ?\)) ?(\d{3}) ?(\-|\.)? ?(\d{4})|^(\d{3})(( ?\.| ?\-) ?)(\d{3}) ?(\-|\.) ?(\d{4})|\d{10}/';
		//If user input is not valid display error.
        if (!preg_match($validPhoneNumber, $phoneNumber)) {
            $error = "*Sorry that's not a valid phone number";
            $phoneNumber = $_POST['phoneNumber'];
		//If user input is valid display success message
        } else {
            $success = "YEAH MATCH!!!";
        }
    }   
}
?>