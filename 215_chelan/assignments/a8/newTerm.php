<!--
Maryanne Derige
Date Created or Modified: 3-10-17
http://chelan.highline.edu/~maryannederige/215/assignments/a8/newTerm.php

File is part of the user interface which contains form for user to add a
term and definition to the dictionary.
-->
<?php
    /* error reporting */	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
    
    //echo "<pre>";
    //print_r ($_POST);
    //echo "</pre>";
?>

<section>
<h2 class="title">Web Related Terms Dictionary</h2>
    <p class="center">To add a new term to the dictionary enter a term <br>
    and its definition in the appropriate fields.</p>
    <form action="." method="post">
        <label>Term: </label><br/>
        <input type="text" name="term" value="<?php if(isset($_POST['submit'])) echo $term; ?>"><br/><br/>
        <label>Definition: </label><br/>
        <textarea rows="5" cols="50" maxlength="600"name="definition"><?php if (isset ( $_POST['submit']) && isset( $_POST['definition'])) {
					echo $definition;}?>
        </textarea>
        <br/><br/>
        <input type="hidden" name="action" value="addTerm">
        <input type="submit" name="submit" value="Submit">
        <span class="error"><?php if (isset($_POST['submit']))echo $error;?></span>
        <span class="success"><?php if (isset($_POST['submit']))echo $success . "<br/>";?></span>
    </form>
<br/>
<div class="center">
    <button onclick="window.location.href='index.php?action=wotd'" id="addButton">View another word of the day</button>
    <button onclick="window.location.href='index.php?action=showAll';" id="addButton">View Dictionary</button>
</div>
<br/><br/>
</section>



