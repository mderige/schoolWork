<?php
/*
Maryanne Derige
Date Created or Modified: 2-19-17
http://chelan.highline.edu/~maryannederige/215/assignments/a5/question2.php


File is part of the user interface which contains a form with question two of
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
            <label>2) How many times do you brush your teeth per day?</label><br>
            <span class="error"><?php echo $error; ?></span><br>
            <input type="radio" name="question2" value="A"
            <?php if (isset($_POST['question2']) && $_POST['question2'] == "A")
                    echo 'checked="checked"';?>>
                What's brushing your teeth? <br> 
            <input type="radio" name="question2" value="B"
            <?php if (isset($_POST['question2']) && $_POST['question2'] == "B")
                    echo 'checked="checked"';?>>
                I brush them most days <br>
            <input type="radio" name="question2" value="C"
            <?php if (isset($_POST['question2']) && $_POST['question2'] == "C")
                    echo 'checked="checked"';?> >
                2 <br>
            <input type="radio" name="question2" value="D"
            <?php if (isset($_POST['question2']) && $_POST['question2'] == "D")
                    echo 'checked="checked"';?> >
                5 <br><br>
                
            <input type="hidden" name="action" value="question3">
            <input type="submit" name="continue" value="continue">
        </form>
</section>

<?php require_once 'footer.php'; ?>