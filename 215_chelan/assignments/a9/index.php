<!--
Maryanne Derige
Date Created or Modified: 3-19-17
http://chelan.highline.edu/~maryannederige/215/assignments/a9/index.php


Default file for this application's directory. This application uses AJAX to
suggest text matches between a user's input and items in adds.text file. The
suggestions appear below the text input field and can be clicked on to take the
user to the display page for the specific item. The user can also search for the
full item name and click the show details button to take the user to the display
page for the specific item.
-->


<?php include 'header.php' ?>
<?php
/* error reporting */	
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>    
<script>
    /* Function that will receive data sent from the server and will update
    div section in the same page*/
    function showHint (str) {
        var xhttp; // The variable that makes Ajax possible!
         //Browser Support Code
        try{
         // Opera 8.0+, Firefox, Safari
            xhttp = new XMLHttpRequest();
        }catch (e){
         // Internet Explorer Browsers
            try{
                xhttp = new ActiveXObject("Msxml2.XMLHTTP");
            }catch (e) {
                try{
                    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        
        if (str.length === 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xhttp.responseText;
            }
        };
        
        xhttp.open("GET", "getHint.php?q="+str, true);
        xhttp.send(null);   
    }
</script>

<section>
<h2>What product would you like?</h2>
    <form action="details.php" method="post">
        <input type="text" name="userInput" id="user_input"
             onkeyup="showHint(this.value);"><br/>
        <p>Suggestion:<br/><br/> <span id="txtHint"></span></p>
        <input type="submit" name="submit" value="Show Details">
    </form>
</section>
<br /><br />
<?php include 'footer.php' ?>