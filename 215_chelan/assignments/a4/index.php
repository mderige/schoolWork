<!--
Maryanne Derige
Date Created or Modified: 2-12-17
http://chelan.highline.edu/~maryannederige/215/assignments/a4/index.php



Default file for this application's directory. Controller file that receives
HTTP requests from browsers, gets the appropriate $action
data from the model, and returns the appropriate views to the browsers.
-->


<?php
	
	
	/* error reporting */	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
/*
	print "<pre>";
	print_r($_POST);
	print "</pre>";
*/	
	require 'db.php'; //Database connection
	require 'db_functions.php'; //Contains sql queries
		
	//Check if action is set in POST or GET. Default to add form.
	if (isset($_POST['action'])) {
		$action = filter_input(INPUT_POST, 'action');
	} else if (isset($_GET['action'])) {
		$action = 	filter_input(INPUT_GET, 'action');
	} else {
		$action = 'showAddForm';
	}
	
	
	switch($action) {
	//Display add book form
		case 'showAddForm':
			header ('Location: add_book_form.php');
			break;
	//Add new book to book list
		case 'add':
			$category = $_POST['category'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$description = htmlspecialchars($description, ENT_QUOTES);
			$price = $_POST['price'];
			addBook($category, $title, $description, $price);
			include ('add_book_form.php');
			break;
	//Display update form
		case 'showEditForm':
			$book_id = filter_input(INPUT_GET, 'book_id', FILTER_VALIDATE_INT);
			if ($book_id == NULL) {
				$book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
			}
			$book = getbook($book_id);
			include 'update_book_form.php';
			break;
	//Allow user to select a book entry to edit
		case 'edit':
			$book_id = $_POST['book_id'];
			$book_result = getbook($book_id);
			break;
	//Update book list with any of the users changes
		case 'updateList':
			$book_id = $_POST['book_id'];
			$book = getbook($book_id);
			include 'validation_update_form.php';
			$category = $_POST['category'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			//updateBook($book_id, $category, $title, $description, $price);
			//include_once 'success.php';
			break;
	//Delete book entry from list	
		case 'delete':
			$category = $_POST['category'];
			$book_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
			if ($book_id == NULL || $book_id == FALSE) {
				$error = "Unable to delete book";
				include ('error_page.php');
			} else {
				deleteBook($book_id);
				include 'books_display.php';	
			}
			break;
	//Display book list
		case 'showBookList':
			displayBookList();
			include 'books_display.php';
			break;
	}
?>	
	
