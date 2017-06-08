<?php
/*
Maryanne Derige
Date Created or Modified: 2-19-17
http://chelan.highline.edu/~maryannederige/215/assignments/a5/question1.php


File is part of the user interface which contains a form with question one of
personality test.
*/

    //Put session stuff here

    require_once 'header.php';
    
    /* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
	
/*
	print "<pre>";
	print_r($_POST);
	print "</pre>";
*/
    
    
?>

<section>
    <h2 class="title">Personality Test</h2>
        <p id="instructions">Time to find out more about your personality. When completing your
        personality test, remember to select the first option that comes to your
        head. Don't overthink it ;-)</p>

<br>
      
        <form action="." method="post">
            <label>1) When you see a chicken what is your first reaction?</label><br>
            <span class="error"><?php echo $error; ?></span>
            <br>
            <input type="radio" name="question1" value="A"
            <?php if (isset($_POST['question1']) && $_POST['question1'] == "A")
                    echo 'checked="checked"';?>>
                Wonder why she's not crossing the road <br> 
            <input type="radio" name="question1" value="B"
            <?php if (isset($_POST['question1']) && $_POST['question1'] == "B")
                    echo 'checked="checked"';?>>
                I better get out of here <br>
            <input type="radio" name="question1" value="C"
            <?php if (isset($_POST['question1']) && $_POST['question1'] == "C")
                    echo 'checked="checked"';?> >
                Start making clucking noises <br>
            <input type="radio" name="question1" value="D"
            <?php if (isset($_POST['question1']) && $_POST['question1'] == "D")
                    echo 'checked="checked"';?> >
                Think about how it tastes <br><br>
                
            <input type="hidden" name="action" value="question2">
        
            <input type="submit" name="continue" value="continue">
	   </form>
		
</section>

<?php require_once 'footer.php'; ?>