<!--
Maryanne Derige
Date Created or Modified: 2-5-17
http://chelan.highline.edu/~maryannederige/215/assignments/a3/books_display.php

File contains display of book list and allows user to delete and update entries.
-->

<?php
	include_once 'db.php';
	include_once 'db_functions.php';
	include_once 'header.php';
	/* error reporting */	
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
/*
	print "<pre>";
	print_r($_POST);
	print "</pre>";
*/
	
	$books = displayBookList();
?>
    <a href="index.php">Back to Book Entry</a>
    
	<section>
	<h2 class="title">Book List</h2>
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
                <td><?php echo $book['category']; ?></td> 
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['description']; ?></td>
                <td><?php echo "$" . $book['price']; ?></td>
                <td>
					<form action="." method="post" class="form_deleteButton">
						<input type="hidden" name="action" value="delete" />
						<input type="hidden" name="book_id" 
							   value="<?php echo $book['book_id'];?>" />
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