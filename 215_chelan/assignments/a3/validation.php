<?php
/*
Maryanne Derige
Date Created or Modified: 2-5-17
http://chelan.highline.edu/~maryannederige/215/assignments/a3/validation.php

File contains validation for user input from the add book entry form. Also displays
confirmation summary.
*/

	ini_set('display_errors', 1);
	error_reporting(E_ALL);


	//initialize local variables
	$title = "";
	$titleErr = "";
	$description = "";
	$descriptionErr = "";
	$price = "";
	$priceErr = "";
	$category = "";
	$categoryErr = "";
	$isValidForm = TRUE;
	
		
	//Check if data is submitted in $_POST
	if (isset ($_POST['submit'])) {
		
		//Check if title field is empty. Display error msg if empty.
		if (empty($_POST['title'])) {
			$titleErr = "Please enter book title";
			$isValidForm = FALSE;
		} else {
			//User entered title.
			$title = trim($_POST['title']);
			//Validate title. Contains letters and numbers only. If not, display error message.
			if (!ctype_alnum(str_replace(' ', '', $title))) {
				$titleErr = "Invalid title. Enter letters and numbers only.";
				$title = $_POST['title'];
				$isValidForm = FALSE;
			//Title contains letters and numbers only. Continue formatting.	
			}else {
				$title = ucwords(strtolower($title));
			}	
		}
		//Check if description field is empty.
		if (!strlen(trim($_POST['description']))) {
			// If description field empty, display error msg.
			$descriptionErr = "Please enter description";
			$isValidForm = FALSE;
		} else { //User entered description.
			$description = trim($_POST['description']);
			//Validate description. Contains letters, numbers, and punctuations only. If not, display error message.
			$testStr = str_replace(' ', '', $description);
			if (!preg_match('/^[A-Za-z0-9,.?\-!@#\$%\^&*\(\)\'-]+$/', $testStr)) {
				$descriptionErr = "Invalid input. Special characters allowed: !@#$%^&*(),.?";
				$description = $_POST['description'];
				$isValidForm = FALSE;
			}
		}
		
		//Check if price field is empty. Display error msg if empty.
		if (empty($_POST['price'])) {
			$priceErr = "Please enter a price. Maximum price of $100.00";
			$isValidForm = FALSE;
		} else { //User entered a price.
		$price = trim($_POST['price']); 
			//Validate price
			if  (is_numeric($price) && $price > 0 && $price <= 100) {
				$price = number_format($price, 2);
			} else {
				$priceErr = "Please enter a price. Maximum price of $100.00";
				$price = $_POST['price'];
				$isValidForm = FALSE;
			}
		}
		
		//Check if user selected an option and did not leave default -- .
		if (isset($_POST['category']) && ("--" == $_POST['category'])) {
			$categoryErr = "Please select a category";
			$isValidForm = FALSE;
		} else {
			$category = $_POST['category'];
		}
		 
    //If all input is valid, display summary.
		if ($isValidForm) {
			echo "<div id=\"summary\"> 
			<h2>Your book has been entered</h2> \n
			<p>Book Title: $title</p> \n
			<p>Description: $description</p> \n
			<p>Price: $$price</p> \n
			<p>Category: $category</p> \n
			<h2>Thank you</h2>
			</div>";
		} 
    } //End of form submission IF
    
?> 