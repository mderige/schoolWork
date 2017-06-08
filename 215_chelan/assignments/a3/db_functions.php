<!--
Maryanne Derige
Date Created or Modified: 2-5-17
http://chelan.highline.edu/~maryannederige/215/assignments/a3/db_functions.php

File contains all functions used in this application. Functions include SQL
queries using PDO.
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

    //Add book entry
    function addBook ($category, $title, $description, $price) {
        global $db;
        // Check if table exists in database
        // Try a select statement against the table
        // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
        try {
            $result = $db->query("SELECT 1 FROM tblbooks2 LIMIT 1");  
        } catch (Exception $e) {
            // We got an exception == table not found
            return FALSE;
        }
    
        // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
        if ($result !== FALSE) {
	    //echo "table found";
            //Define the query:
            $query = "INSERT INTO tblbooks2 (category, title, description, price)
			VALUES ('$category', '$title', '$description', '$price')";
            $db->exec($query);
        } else {
            die ("<br><br><span class=\"error\">Table not found.
		 Unable to add entry.</span>");
        }
    }
    
    //Display book list
    function displayBookList () {
         global $db;
        $query = "SELECT * FROM tblbooks2 ORDER BY book_id DESC";
        $books = $db->query($query);
        return $books;
    }

    //Delete a book entry
    function deleteBook($book_id) {
        global $db;
        $query = 'DELETE FROM tblbooks2 WHERE book_id = :book_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $book_id);
        $statement->execute();
        $count = $statement->rowCount();
        $statement->closeCursor();
        echo '<script type="text/javascript">';
        echo 'alert("'.$count.' book successfully deleted!")';
        echo '</script>';
    }
    
    //Update data fields of chosen book
   function updateBook($book_id, $category, $title, $description, $price) {
        global $db;
        $query = "UPDATE tblbooks2 SET category = '$category', title = '$title',
	description = '$description', price = '$price' WHERE book_id = '$book_id'";
        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $book_id);
        $statement->bindValue(':category', $category);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $count = $statement->rowCount();
        $statement->closeCursor();
	if ($count = 1){
		echo '<script type="text/javascript">';
		echo 'alert("'.$count.' book successfully updated!")';
		echo '</script>';	
	} else {
		echo "Error";
	}
    }
    
    //Retrieve a specific book entry
   function getBook($book_id) {
        global $db;
        $query = 'SELECT * FROM tblbooks2 WHERE book_id = :book_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $book_id);
        $statement->execute();
        $book = $statement->fetch();
        $statement->closeCursor();
        return $book;
    } catch (PDOException $e) {
	$errorMessage = $e->getMessage();
	echo $errorMessage;
    }
   }
?>
