<!--
Maryanne Derige
Date Created or Modified: 2-3-17
http://chelan.highline.edu/~maryannederige/215/assignments/a3/update_book_form.php
-->

<?php
  /* error reporting */	
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
	

	print "<pre>";
	print_r($_POST);
	print "</pre>";
  
  
    
    print_r ($book_result);
    
    
  
    $category = $book_result['category'];
    $categoryErr = "";
    $title = $book_result['title'];
    $titleErr = "";
    $description = $book_result['description'];
	$descriptionErr = "";
	$price = $book_result['price'];
	$priceErr = "";
	$isValidForm = TRUE;

    
	//Check if data is submitted in $_POST

	if (isset ($_POST['submit'])) {
		echo "not working";
		//Check if title field is empty. Display error msg if empty.
		if (empty($title)) {
			$titleErr = "Please enter book title";
			$isValidForm = FALSE;
		} else {
			//User entered title.
			$title = trim($title);
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
             // echo "table found";
                //Define the query:
                $query = "INSERT INTO tblbooks2 (category, title, description, price) VALUES ('$category', '$title', '$description', '$price')";
                
                $db->exec($query);        
            } else {
                die ("<br><br><span class=\"error\">Table not found. Unable to add entry.</span>");
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
<br/><br/>  
  
  
  
  
  
?>

<?php include 'header.php';?>
<a href="books_display.php">View Book List</a>
<br/><br/>


<section>
	
	<form method="post" action="index.php">
		<h2 id="instructions">UPDATE BOOK ENTRY ***ADD more description***</h2>
		<fieldset>
			<label>Book Title:</label><span class="error">*<?php echo $titleErr ?></span><br />
			<input type="text" name="title"
				<?php 
					echo ("value = \"" . $title . "\" ");
				?>/> <br />
			
			<label>Description:</label><span class="error">*<?php echo $descriptionErr ?></span><br />
			<textarea name="description" rows="3" cols="50" maxlength="375">
				<?php 
					echo $description;
				?>
			</textarea><br />
			
			<label>Price:</label><span class="error">*<?php echo $priceErr ?></span><br />
			<input type="text" name="price" size="6" maxlength="6"
				<?php
					echo ("value = \"" . $price . "\" ");
				?>/> <br />
			
			<label>Category:</label><span class="error">*<?php echo $categoryErr ?></span><br />
			<select name="category">
				<option value="--">--</option>
				<option value="Romance"
					<?php if ($category == 'Romance')
					echo 'selected';?> >Romance</option>
				<option value="Mystery"
					<?php if ($category == 'Mystery')
					echo 'selected';?> >Mystery</option>
				<option value="Horror"
					<?php if ($category == 'Horror')
					echo 'selected';?> >Horror</option>
				<option value="Drama"
					<?php if ($category == 'Drama')
					echo 'selected';?> >Drama</option>
			</select>
								
			<br /><br >
             <input type="hidden" name="action" value="updateList" />
			<input type="hidden" name="book_id" 
						value="<?php echo $_POST['book_id'];?>" />
			<input type="submit" name="submit" value="UPDATE" />
	</form>
</section>
<br /><br />





<br/>
<?php include 'footer.php'; ?>