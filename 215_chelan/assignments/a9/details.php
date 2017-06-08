<!--
Maryanne Derige
Date Created or Modified: 3-19-2017
http://chelan.highline.edu/~maryannederige/215/assignments/a9/details.php


File contains view of selected item from index.php. The item name, description,
price and larger image is displayed.

-->
<?php
    include 'header.php';
	
	/* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
	
/*
    print "<pre>post";
	print_r($_POST);
	print "</pre>";
	
	print "<pre>get";
	print_r($_GET);
	print "</pre>";
*/
	
	$file = fopen('adds.txt', 'rb');
    $items = array();
    while (!feof($file)) {
        $item = fgets($file);
        if ($item === false) {
            continue;
        } else {
			$exploded = explode(";", $item);
            $items[] = $exploded;
        }
    }
/*		
	print "<pre>";
	print_r($items);
	print "</pre>";
*/
	$name = "";
	$description = "";
	$image = "";
	$price = "";
	$error = "";
	$isValidForm = FALSE;
	
	// check if data sent through $_GET
	if (isset($_GET['userInput'])) {
		$name = trim($_GET['userInput']);
		// check which item was selected and get the selected items name, description, price and image
		foreach ($items as $item) {
			if (strtolower($item[0]) === strtolower($name)) {
				$name = $item[0];
				$description = $item[1];
				$price = $item[2];
				$image = $item[3];
				$isValidForm = TRUE;
			// if there is no match display error	
			} else {
				$isValidForm == FALSE;
				$error = "This item does not exist";
			}
		}
	// check if $_POST['userInput'] is empty, if empty display error	
	} elseif (empty($_POST['userInput'])) {
		$error = "You have not selected an item";
		$error .= "<h3><a href=\"index.php\">View another item</a></h3>";
	} else {
		$name = trim($_POST['userInput']);
	}
	// check if userInput was submitted through $_POST	
	if (isset($_POST['submit']) && !empty($_POST['userInput']) ) {
		// check which item was selected by matching userInput with items from adds.txt file. Get the selected items name, description, price and image
		foreach ($items as $item) {
			if (strtolower($item[0]) === strtolower($name)) {
				$name = $item[0];
				$description = $item[1];
				$price = $item[2];
				$image = $item[3];
				$isValidForm = TRUE;
			// if there is not match display error 	
			} else {
				$isValidForm == FALSE;
				$error = "This item does not exist";
				$error .= "<h3><a href=\"index.php\">View another item</a></h3>";
			}
		}
	}
 ?>   
    <section>
		<?php if (isset($_POST['submit']) && $isValidForm == FALSE) echo "<h2>" . $error . "</h2>";?>
	<?php
		if ($isValidForm == TRUE) {
			echo "<h2>" . $name . "</h2>";
			echo "<p>Description: " . $description . "</p>";
			echo "<p>Price:$" . $price . "</p>";
			echo "<p><img class=\"big-image\" alt=\"item image\" src=\"images/" . $image . "\"/></p>";
			echo "<h3><a href=\"index.php\">View another item</a></h3>";
		}
	?>  
    </section>
	<br /><br />  
<?php include 'footer.php';?>