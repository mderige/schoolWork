<?php
	echo "Logged out successfully";
    
	session_start();
	session_destroy();
	//setcookie(PHPSESSID,session_id(),time()-1);
	setcookie(SID,session_id(),time()-1);
	
?>