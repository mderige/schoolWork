<!--
Maryanne Derige
Date Created or Modified: 3-5-2017
http://chelan.highline.edu/~maryannederige/215/assignments/a7/details.php


File contains view of selected item from index.php. The item name, description,
price and larger image is displayed.

-->
<?php
    include 'item.php';
    session_start();
    include 'header.php';
	
	/* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
	
/*
    print "<pre>";
	print_r($_SESSION);
	print "</pre>";
*/
	$id = "";
	$item = "";
	$name = "";
	$description = "";
	$image = "";
	$price = "";
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	};  
    
	if (isset($_SESSION['items'][$id])) {
		$item = $_SESSION['items'][$id];
		$name = $item->getName();
		$description = $item->getDescription();
		$image = $item->getImage();
		$price = $item->getPrice();
	};
    
	
 ?>   
    <section>
        <?php if (isset($_SESSION['items'][$id])) echo "<h2>" . $name . "</h2>";?>
        <p>Description: <?php echo $description;?></p>
        <p>Price: <?php echo $price;?></p>
        <p><img class="big-image" alt="item image" src="images/<?php echo $image;?>"/></p>
        <h3><a href="index.php">View another item</a></h3>
    </section>  
<?php include 'footer.php';?>