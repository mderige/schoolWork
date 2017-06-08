<?php
/*
Maryanne Derige
Date Created or Modified: 2-19-17
http://chelan.highline.edu/~maryannederige/215/assignments/a5/results.php


File is part of the user interface which displays test results.
*/

    //Put session stuff here

    require_once 'header.php';
    
    /* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
/*    
    print "<pre>";
	print_r($_SESSION);
	print "</pre>";
*/

	$answers = $_SESSION['answers'];
	
	//Assign points to each letter and sum up the total points
    $total = 0;
    foreach ($answers as $answer) {
        
        if ($answer == "A") {
            $total = $total + 1;
        } elseif ($answer == "B") {
            $total = $total + 2;
        } elseif ($answer == "C") {
            $total = $total + 3;
        } else {
            $total = $total + 4;
        }
    }
    
	//Determine personality message with total points and appropriate range 
    $personality = "";
    if ($total <= 3) {
        $personality = "You are a Frog";
    } elseif ($total<=6) {
        $personality = "You are an Ant";
    } elseif ($total<=9) {
        $personality = "You are a Donut";
    } else {
        $personality = "You are always hungry";
    }
    
    
?>
 <section id="summary">   
    <h2 class="title">Personality Test</h2>
    
    <h2>Question Results</h2>
   
    <p>Answer 1: <?php echo $_SESSION['answers']['q1']; ?></p>
    <p>Answer 2: <?php echo $_SESSION['answers']['q2']; ?></p>
    <p>Answer 3: <?php echo $_SESSION['answers']['q3']; ?></p>
    
    <h2>Total Score</h2>
    <?php echo "<h2> $total </h2>" ?>
    
    <h1><?php echo $personality; ?></h1>
	<br>
	
	<h1><a href="index.php">Take the test again!</h1>

</section>  

<?php require_once 'footer.php'; ?>