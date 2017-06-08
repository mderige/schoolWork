<!--
Maryanne Derige
Date Created or Modified: 3-10-17
http://chelan.highline.edu/~maryannederige/215/assignments/a8/index.php


Default file for this application's directory. Controller file that receives
HTTP requests from browsers, gets the appropriate $action
data from the model, and returns the appropriate views to the browsers.

This application displays a random term and defintion from the dictionary.
The application also allows users to enter new terms and definitions to the
dictionary and view the entire dictionary.
-->

<?php
	
	/* error reporting */	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	//echo "<pre>";
	//print_r ($_POST);
	//echo "</pre>";
	
	include 'header.php';
	
	//Check if action is set in POST or GET. Default to word of the day page.
	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL) {
		$action = filter_input(INPUT_GET, 'action');
		if ($action == NULL) {
			$action = 'wotd';
		}
	}
	
	switch ($action) {
	//Display add term form
		case 'showAddForm':
			include 'newTerm.php';
			break;
	//Add new term to dictionary
		case 'addTerm':
			$error = "";
			$success = "";
			$term = "";
			$defintion = "";
			$newEntry = "";
			if (isset($_POST['submit'])) {
			//Check if term or definition is empty. If either is empty, display error.
				if (empty($_POST['term']) || !strlen(trim($_POST['definition']))) {
					$error = "All fields required";
					$term = $_POST['term'];
					$definition = $_POST['definition'];
					include 'newTerm.php';
					break;
			/*If both term and definition have data, clean data and write text
			to dictionary.txt file. Display success message.*/
				} else {
					$term = trim(strip_tags($_POST['term']));
					$newEntry['term'] = $term;
					$definition = trim(strip_tags($_POST['definition']));
					$newEntry['definition'] = $definition;
					$file = fopen('dictionary.txt', 'ab');
					fputcsv($file, $newEntry);
					$success = "Entry added successfully";
					fclose($file);
					include 'newTerm.php';
					break;
				}
			}
	//Display dictionary table
		case 'showAll':
			$file = fopen('dictionary.txt', 'rb');
			$definitions = array();
			while (!feof($file)) {
				$definition = fgetcsv($file);
				if ($definition === false) {
					continue;
				} else {
					$definitions[] = $definition;
				}
			}
			include 'dictionaryView.php';
			break;
	//Display word of the day page with one random word
		case 'wotd':
			$file = fopen('dictionary.txt', 'rb');
			$definitions = array();
			while (!feof($file)) {
				$definition = fgetcsv($file);
				if ($definition === false) {
					continue;
				} else {
					$definitions[] = $definition;
				}
			}
			$numTerms = count($definitions);
			$termIndex = rand(0, $numTerms-1);
			//echo $termIndex;
			include 'wotd.php';
			break;
		default:
			echo "<h2 class=\"error\">Go away Hacker!!!</h2><br/><br/>";
			break;
	}
	include 'footer.php';
	
	/*	echo "<pre>";
		print_r ($definitions);
		echo "</pre>";
	*/
?>