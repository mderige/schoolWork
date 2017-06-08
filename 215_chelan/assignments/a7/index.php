<!--
Maryanne Derige
Date Created or Modified: 3-5-2017
http://chelan.highline.edu/~maryannederige/215/assignments/a7/index.php


Default file for this application's directory. This page contains a table with
rows of items and their description, image and price. The name is a link that
navigates to details.php.


-->
<?php
    session_start();
    require "header.php";
    require "item.php";
    
	/* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
	
    if (!isset($_SESSION['items'])) {
        $_SESSION['items'] = array();
    }

    $bike = new Item("0", "Porsche Bike", "A bike with a brand name!", "10,000", "bike.jpg");
    $objectsArray[] = $bike;
    
    $shoes = new Item("1","Pretty Shoes", "Come to our shoe store", "54.45", "shoes.jpg");
    $objectsArray[] = $shoes;
    
    $pie = new Item("2", "Pie Fest!", "Oh yeah this is officially the best pie ever", "3.45", "pie.jpg");
    $objectsArray[] = $pie;
    
    $umbrella = new Item("3", "Inside Out Umbrella", "Designer umbrellas for low cost", "14.55", "umbrella.jpg");
    $objectsArray[] = $umbrella;
    
    $coffee = new Item("4", "Coffee", "Come get your morning dessert", "4.59", "coffee.jpg");
    $objectsArray[] = $coffee;
        
    $_SESSION['items'] = $objectsArray;
/*    
    print("<pre>");
	print_r($_SESSION);
	print("</pre>");
	print"<br>";
*/    
    echo "<section>";
	echo "<h2>Shopping List</h2>";
    echo "<table>";
	echo "<tr><th class=\"row-name\">Item Name</th>";
	echo "<th class=\"row-description\">Description</th>";
	echo "<th class=\"row-image\">Image</th>";
	echo "<th class=\"row-price\">Price</th></tr>";
    foreach ($objectsArray as $item) {
		echo "<tr><td><a href=\"details.php?id=" . $item->getId() . "\">" . $item->getName() . "</a></td>";
		echo "<td>" . $item->getDescription() . "</td>";        
		echo "<td><img src=\"images/" . $item->getImage() . "\" alt=\"item image\"/></td>";
		echo "<td>$" . $item->getPrice() . "</td></tr>";       
    }
    echo "</table>";
    echo "</section><br/>";    
require "footer.php";      
?>