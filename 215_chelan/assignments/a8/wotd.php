<!--
Maryanne Derige
Date Created or Modified: 3-10-17
http://chelan.highline.edu/~maryannederige/215/assignments/a8/wotd.php

File contains view of the word of the day. The word of the day is randomly
selected from the entire dictionary list.
-->

<section>
    <h2 class="title">Word of the Day</h2>
    <div class="center">
        <button onclick="window.location.href='index.php?action=showAddForm'" id="addButton">
            Add New Term</button>
        <button onclick="window.location.href='index.php?action=showAll';" id="viewButton">
            View Dictionary</button>
    </div>
    <br><br/>
    <table>
        <tr>
            <th>Term </th>
            <th>Definition</th>
        </tr>
        <tr>
            <td><?php echo $definitions[$termIndex][0];?></td>
            <td><?php echo $definitions[$termIndex][1];?></td>
        </tr>
    </table>
    <br/><br/>
</section>