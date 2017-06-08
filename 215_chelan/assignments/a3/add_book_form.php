<!--
Maryanne Derige
Date Created or Modified: 2-5-17
http://chelan.highline.edu/~maryannederige/215/assignments/a3/add_book_form.php


File is part of the user interface which contains form for user to add a book entry.
-->

<?php include 'header.php';?>

<a href="books_display.php">View Book List</a>

<?php include 'validation.php';?>

<?php
/* error reporting */	
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
	
/*
	print "<pre>";
	print_r($_POST);
	print "</pre>";
 */           
?>

<br/><br/>
<section>
	
	<form method="post" action="index.php" >
	<h2 id="instructions">This book list maintains all books in Mary's library.
	If you would like to recommend a book for Mary to read, please complete
	the entire form below.</h2>
		<fieldset>
			<label>Book Title:</label><span class="error">*<?php echo $titleErr ?></span><br />
			<input type="text" name="title"
				<?php if (isset($_POST['submit'])) {
					echo ("value = \"" . $title . "\" ");
				}?>/> <br />
			
			<label>Description:</label><span class="error">*<?php echo $descriptionErr ?></span><br />
			<textarea name="description" rows="3" cols="50" maxlength="500"><?php if (isset ( $_POST['submit']) && isset( $_POST['description'])) {
					echo $description;
				}?>
			</textarea><br />
			
			<label>Price:</label><span class="error">*<?php echo $priceErr ?></span><br />
			<input type="text" name="price" size="6" maxlength="6"
				<?php if (isset($_POST['submit'])) {
					echo ("value = \"" . $price . "\" ");
				}?>/> <br />
			
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
			<input type="hidden" name="action" value="add" />
			<input type="submit" name="submit" value="SUBMIT" />
			&nbsp; &nbsp; &nbsp;
			
			<button onclick="window.location.href='books.php'" id="reloadButton">RESET</button>
		</fieldset>
	</form>
</section>
<br /><br />

<?php include 'footer.php'; ?>