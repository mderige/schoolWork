<!--
Maryanne Derige
Date Created or Modified: 2-12-17
http://chelan.highline.edu/~maryannederige/215/assignments/a6/footer.php


File contains footer with links to the class directory and to Mary's homepage.
There is also a link for html validation.
-->

	

	<a href="../../index.htm">Return to homepage</a>
	<br />
	<a href="http://chelan.highline.edu/~jsnyder/215/dir.htm">Class Directory</a>
	
	<footer>
	<?php 
	//Page validation
		$validate = "https://validator.w3.org/nu/?doc=https://" ;
        $validate .= $_SERVER['SERVER_NAME'] ;
		$validate .= $_SERVER['SCRIPT_NAME'] ;
        print "<a href=\"$validate\">Validate</a>";	
    ?>
	</footer>
	</body>
</html>