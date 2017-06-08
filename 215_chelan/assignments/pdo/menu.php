<?php
    session_start();
    
    //User is logged in
    if($_SESSION['username'])
    {
        echo "<ul>";
        switch($_SESSION['level'])
        {
            //Display options based on auth level
            case 1:
                echo "<li>Manage users</li>";
            case 2:
                echo "<li>View reports</li>";
            case 3:
                echo "<li>View products</li>";
        }
        echo "</ul>";
        echo "<a href='logout.php?".SID."'>logout</a>";
    }
    //User is not logged in
    else
    {
        header('location: login.php?'.SID);
    }
?>