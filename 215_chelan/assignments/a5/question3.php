<?php
/*
Maryanne Derige
Date Created or Modified: 2-19-17
http://chelan.highline.edu/~maryannederige/215/assignments/a5/question3.php


File is part of the user interface which contains a form with question three of
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
            <label>3) When you look at the clouds what do you see?</label><br>
            <span class="error"><?php echo $error; ?></span><br>
            <input type="radio" name="question3" value="A"
            <?php if (isset($_POST['question3']) && $_POST['question3'] == "A")
                    echo 'checked="checked"';?>>
                I don't, it hurts my eyes <br> 
            <input type="radio" name="question3" value="B"
            <?php if (isset($_POST['question3']) && $_POST['question3'] == "B")
                    echo 'checked="checked"';?>>
                Seattle <br>
            <input type="radio" name="question3" value="C"
            <?php if (isset($_POST['question3']) && $_POST['question3'] == "C")
                    echo 'checked="checked"';?> >
                Little characters <br>
            <input type="radio" name="question3" value="D"
            <?php if (isset($_POST['question3']) && $_POST['question3'] == "D")
                    echo 'checked="checked"';?> >
                Stop asking me studpid questions <br><br>
                
            <input type="hidden" name="action" value="displayResults">
            <input type="submit" name="continue" value="continue">
		</form>
</section>

<?php require_once 'footer.php'; ?>