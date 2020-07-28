<!-- In the name of Allah -->

<!DOCTYPE html>

<html>

<head>
    <title>PHP Dict</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <?php
        include('dbinfo.php');
        $dbconnection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport);
        if (mysqli_connect_errno()){
            die("<div class=\"alert alert-danger alarm\">Could not connect to the database.</div>");
        }
        $result = mysqli_query($dbconnection,"SELECT * FROM dict ORDER BY key_text;");
    ?>
    <center>
    <h1 class="text-white space display-3">PHP Dict</h1>
    <a href="add.php"><button type="button" class="btn btn-success space">Add a new item</button></a>
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
                    echo "<th scope=\"row\">".$row['key_text']."</th>";
                    echo "<td>".$row['value_text']."</td>";
                    echo "<td><a href=\"edit.php?id=".$row['id']."\"><button type=\"button\" class=\"btn btn-primary\">Edit</button></a></td>";
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>
    <span class="text-white info"><a href="http://me.mwxg.ir/" class="text-warning">MWX</a> | 2020</span>
    </center>
</div>
<script src="lib/js/jquery-3.5.1.slim.min.js"></script>
<script src="lib/js/bootstrap.bundle.min.js"></script>
</body>

</html>