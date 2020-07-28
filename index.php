<?php
    include('header.php');
    $result = mysqli_query($dbconnection,"SELECT * FROM dict ORDER BY key_text;");
?>
<a href="add.php"><button type="button" class="btn-lg btn-success space">Add a new item</button></a>
<table class="table table-striped table-dark table-hoverable">
    <thead>
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
            <th scope="col">Info</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<th scope=\"row\">".htmlentities($row['key_text'])."</th>";
                echo "<td>".htmlentities($row['value_text'])."</td>";
                echo "<td><a href=\"edit.php?id=".$row['id']."\"><button type=\"button\" class=\"btn btn-primary\">Edit</button></a></td>";
                echo "</tr>";
            }
            mysqli_free_result($result); 
        ?>
    </tbody>
</table>
<span class="text-white info"><a href="http://me.mwxg.ir/" class="text-warning">MWX</a> | 2020</span>
<?php include('footer.php'); ?>