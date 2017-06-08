<!--
Maryanne Derige
Date Created or Modified: 3-10-17
http://chelan.highline.edu/~maryannederige/215/assignments/a8/dictionaryView.php

File contains view of entire dictionary in a table format.
-->

<section>
<h2 class="title">Dictionary</h2>
	<div class="center">
		<button onclick="window.location.href='index.php?action=showAddForm'"
				id="addButton">Add New Term</button>
		<button onclick="window.location.href='index.php?action=wotd';"
				id="viewButton">View another word of the day</button>
	</div>
<br/>
<?php
    echo "<table>
            <tr>
                <th>Term</th>
                <th>Definition</th>		
            </tr>";
    foreach ($definitions as $definition) {
        echo "<tr><td>" . $definition[0] . "</td><td>" . $definition[1]
		. "</td></tr>";
	}
	echo "</table>";
?>
</section>
<br/><br/>