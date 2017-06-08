<!--
Maryanne Derige
Date Created or Modified: 2-12-17
http://chelan.highline.edu/~maryannederige/215/assignments/a4/books_display.php

File contains display of book list and allows user to delete and update entries.
-->

<?php
	//Starting a session
	//session_start();

	include_once 'db.php';
	include_once 'db_functions.php';
	include_once 'header.php';
	/* error reporting */	
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
/*
	print "<pre>";
	print_r($_POST);
	//print_r($_SESSION);
	print_r($_GET);
	print "</pre>";
*/

	$categories= array(1=>"Romance", 2=>"Mystery", 3=>"Horror", 4=>"Drama");
	$category = "";
	$count = "";
	
	if (isset($_POST['category'])) {
		$category = $_POST['category'];
	} else if (isset($_GET['category'])){
		$category = $_GET['category'];
	} else {
		$category = "All";
	}
	
	//print_r ($books);

	if ($category == "All") {
		$books = displayBookList();
	} elseif ($category == "Romance") {
		$books = displayRomance();
	} elseif ($category == "Mystery") {
		$books = displayMystery();
	} elseif ($category == "Horror") {
		$books = displayHorror();
	} else {
		$books = displayDrama();
	}
?>
    <a href="index.php">Back to Book Entry</a>
    <aside>
		<!--Form for category drop down menu and search submit button-->
		<form class="searchForm" method="post" action=".">
			<select name="category">
				<option value="All">Show All</option>
		    		<?php //print_r($categories);
					
		    			// use for loop to display option elements for select
		    			foreach ($categories as $key => $value) { // loop through all categories
							//echo "<option value=\"$categories[$i]\">$categories[$i]";
							if ($categories[$key] == $category) { //if user selects a category
							echo "<option value=\"$categories[$key]\" selected>$categories[$key]</option>";
							} else {
							echo "<option value=\"$categories[$key]\">$categories[$key]</option>";
							}
						}	
					?>
		    </select>
			<input type="hidden" name="action" value="showBookList" />
			<input type="submit" value="Search" />
		</form>
	</aside>
	<section>
	<h2 class="title">Book List</h2>
	<?php echo $count;?>
    <table>
            <tr>
                <th class="row-category">Category</th>
                <th class="row-title">Title</th>
                <th class="row-description">Description</th>
                <th class="row-price">Price</th>
                <th class="row-btns">&nbsp;</th>
                
            </tr>
            <?php foreach ($books as $book) : ?>
            <tr>
                <td>
				<?php
					$categoryID = $book['category_id'];
					$categoryName = $categories[$categoryID];
					echo $categoryName;
				?>
				</td> 
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['description']; ?></td>
                <td><?php echo "$" . $book['price']; ?></td>
                <td>
					<form action="." method="post" class="form_deleteButton">
						<input type="hidden" name="action" value="delete" />
						<input type="hidden" name="book_id" 
							   value="<?php echo $book['book_id'];?>" />
						<input type="hidden" name="category" 
							   value="<?php echo $categoryName;?>" />
						<input type="submit" value="Delete" />
                    </form>
				
					<form action="." method="post" class="form_deleteButton">
						<input type="hidden" name="action" value="showEditForm" />
						<input type="hidden" name="book_id" 
								value="<?php echo $book['book_id'];?>" />
						 <input type="submit" value="Update" />
					</form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>    
    </section> 
	<br/>
    <footer>
	<?php 
	//Page validation
		$validate = "https://validator.w3.org/nu/?doc=https://" ;
        $validate .= $_SERVER['SERVER_NAME'] ;
		$validate .= $_SERVER['SCRIPT_NAME'] ;
        print "<a href=\"$validate\">Validate</a>";	
    ?>
	</footer>          
</body>
</html>