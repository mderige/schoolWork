<?php
/*
Maryanne Derige
Date Created or Modified: 2-5-17
http://chelan.highline.edu/~maryannederige/215/assignments/a3/db.php

File contains PDO connection to localhost database.
*/

/* error reporting */	
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

//Connect to root localhost
    $username='MaryanneDerige_webuser';
    $password='Mary_17138$A2z';    
    try {
        $db = new PDO('mysql:host=localhost;dbname=MaryanneDerige', $username, $password);
        //echo "Success";
    }
    catch (PDOException $e) {
        die( "Error!: " . $e->getMessage());
    }
?>