<?php
/* Database connection code */

// get filepath for changing connection based on folder
$filePath = $_SERVER['PHP_SELF'];

//localhost or localhost:8080
if ($_SERVER ['HTTP_HOST'] == "localhost" || $_SERVER ['HTTP_HOST'] == "localhost:8080") {
	$dsn = 'mysql:host=localhost;dbname=your-username'; # dbname might be root or blank if no database name
	$username = 'your-username';
	$password = 'your-password';
	//     	$password = 'x'; # force an error for testing

	// chelan.highline.edu
} else if ($_SERVER ['HTTP_HOST'] == "chelan.highline.edu") {

	$dsn = 'mysql:host=localhost;dbname=your-chelan-username';
	$username = 'your-chelan-username';
	$password = "your-chelan-password";

	 
	//     code is being executed on unknown server
	//		(canvas app on mobile device falls into this case)
} else {
	 
	/*     	Temporarily allow this so it can run in the canvas app
	 *
	 // Display an error and force program to exit -
	 $errorMessage = "Unknown server while trying to connect to database.";
	 include('dbError.php');
	 exit();
	 */
	 
	$dsn = 'mysql:host=localhost;dbname=your-chelan-username';
	$username = 'your-chelan-username';
	$password = "your-chelan-password";
	 
}

try {
	$dbh = new PDO($dsn, $username, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	$errorMessage = $e->getMessage();
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Database Error</title>
    <link rel="stylesheet" type="text/css" href="css/poll.css" />
</head>
<body>
    <div id="page">
        <div id="main">
            <h1>Database Error</h1>
            <p>There was an error connecting to the database.</p>
            <p>DSN: <?php echo $dsn; ?></p>
            <p>UserName: <?php echo $username; ?></p>
            <p>Error message: <?php echo $errorMessage; ?></p>
            <p>&nbsp;</p>
        </div><!-- end main -->
    </div><!-- end page -->
</body>
</html>
<?php
        
         exit();
    }
?>
