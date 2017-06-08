<?php
/*
Maryanne Derige
Date Created or Modified: 2-5-17
http://chelan.highline.edu/~maryannederige/215/assignments/a3/dbChelan.php

File contains PDO connection to localhost database.
*/


/* error reporting */	
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        
        
//Connect to chelan server 
    $username='MaryanneDerige_webuser';
    $password='Mary_17138$A2z';    
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=MaryanneDerige', $username, $password);
        //echo "Success";
    }
    catch (PDOException $e) {
        die( "Error!: " . $e->getMessage());
    }
?>

        