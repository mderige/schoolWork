<?php
    /*
        add_user.php
        
        teejo db on ned
        DROP TABLE tblUsers;
        CREATE TABLE tblUsers(
        userid INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
        username VARCHAR( 20 ) NOT NULL ,
        password VARCHAR( 50 ) NOT NULL ,
        level INT NULL
        );
    */

    
    require_once 'db.php';
    
    $valid = true;
    if(isset($_POST['submit'])){
        
        //Get username and make sure it's not already taken
        $username = $_POST['username'];
        $sql = "SELECT * FROM tblUsers WHERE username = :username"; 

        $statement = $dbh->prepare($sql);
        
        $statement->bindParam(":username", $username, PDO::PARAM_STR); 
        $statement->execute();
        if($statement->rowCount() >= 1) {
            $valid = false;
            echo "<p>Sorry... that username is already taken.</p>";
        }
        
        //Validate password
        if($_POST['password'] != $_POST['retype']){
            $valid = false;
            echo "<p>Your passwords don't match</p>";
        } else {
            $password = $_POST['password'];
            $regex = '/^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}$/';
            if(!preg_match($regex, $password)){
                $valid = false;
                echo "<p>Passwords must be 8 to 20 characters.
                The password may not start with a digit,
                underscore or special character, and must
                contain at least one digit.</p>";
            }
        }
        
        //Assign default level
        $level = 3;
        
        //Data is valid; insert row
        if($valid){
            $sql = "INSERT INTO tblUsers(username, password, level) VALUES(:username,:password,:level)"; 
    
            $statement = $dbh->prepare($sql); 
    
            $hashedPassword = sha1($password);
            $statement->bindParam(":username", $username, PDO::PARAM_STR); 
            $statement->bindParam(":password", $hashedPassword, PDO::PARAM_STR); 
            $statement->bindParam(":level", $level, PDO::PARAM_INT); 
            $statement->execute(); 
            
            echo "User ID: ".$dbh->lastInsertId()."<br />";
            echo "<a href='login.php'>Log In</a>";
        }        
    }

    //Display form if first visit or data is invalid
    if(!isset($_POST['submit']) || !$valid ) {
?>

        <h2>Account Signup</h2>
        
        <form name='account' method='post' action=''>
            Username: <input type='text'
                name='username' /><br /><br />
            Password: <input type='password'
                name='password' /><br /><br />
            Retype Password: <input type='password'
                name='retype' /><br /><br />
            <input type='submit' name='submit'
                value='Submit'>
        </form>

<?php
    }
?>