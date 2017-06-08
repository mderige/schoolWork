<?php
/*
Maryanne Derige
Date Created or Modified: 2-19-17
http://chelan.highline.edu/~maryannederige/215/assignments/a5/index.php

Default file for this application's directory. Controller file that receives
HTTP requests from browsers, gets the appropriate $action
data from the model, and returns the appropriate views to the browsers.
*/

    session_start();
    
	/* error reporting */	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
		
		
    if (!isset($_SESSION['answers'])) {
        $_SESSION['answers'] = array();
    }

    //Check if action is set in POST or GET. Default to display question1.
	if (isset($_POST['action'])) {
		$action = filter_input(INPUT_POST, 'action');
	} else if (isset($_GET['action'])) {
		$action = 	filter_input(INPUT_GET, 'action');
	} else {
		$action = 'displayTest';
	}
	   
    $error = "";
    
    switch($action) {
        case 'displayTest':
            include 'question1.php';
        break;
    
        case 'question2':
            //Check to see if data is submitted in the $POST
            if (isset($_POST['continue'])) {
                //Check if user answered question
                if (empty($_POST['question1'])) {
                    //Display error message if question is unanswered
                    $error = "*You must select one answer to continue";
                     include 'question1.php';
                } else {
                    //If an answer is selected, save it in session variable
                    $_SESSION['answers']['q1'] = $_POST['question1'];
                    include 'question2.php';
                }
            }
        break;
    
        case 'question3':
            //Check to see if data is submitted in the $POST
            if (isset($_POST['continue'])) {
                //Check if user answered question
                if (empty($_POST['question2'])) {
                    //Display error message if question is unanswered
                    $error = "*You must select one answer to continue";
                     include 'question2.php';
                } else {
                    //If an answer is selected, save it in session variable
                    $_SESSION['answers']['q2'] = $_POST['question2'];
                    include 'question3.php';
                }
            }
        break;
    
        case 'displayResults':
            //Check to see if data is submitted in the $POST
            if (isset($_POST['continue'])) {
                //Check if user answered question
                if (empty($_POST['question3'])) {
                    //Display error message if question is unanswered
                    $error = "*You must select one answer to continue";
                     include 'question3.php';
                } else {
                    //If an answer is selected, save it in session variable
                    $_SESSION['answers']['q3'] = $_POST['question3'];
                    include 'results.php';
                }
            }
        break;
    }


?>