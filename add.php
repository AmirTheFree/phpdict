<?php include('header.php'); ?>
<a href="index.php"><button type="button" class="btn btn-light space">Back to home</button></a>
<hr>
<h2 class="text-white">Add a new item</h2>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!empty($_POST)){
            if (preg_match("/^[a-zA-Z]{2,}$/",$_POST['key'])){
                $key = mysqli_escape_string($dbconnection,strtoupper($_POST['key']));
            }
            else{
                die("<br><div class=\"alert alert-danger alarm\">Invalid form!</div>");
            }
            if (preg_match("/^[a-zA-Z ]{2,}$/",$_POST['value'])){
                $value = mysqli_escape_string($dbconnection,ucwords(strtolower($_POST['value'])));
            }
            else{
                die("<br><div class=\"alert alert-danger alarm\">Invalid form!</div>");
            }
            if (isset($key) && isset($value)){
                $result = mysqli_query($dbconnection,"INSERT INTO dict(key_text,value_text) VALUES(\"" . $key . "\",\"" . $value . "\");");
            }
            else{
                die("<br><div class=\"alert alert-danger alarm\">Invalid form!</div>");
            }
            if ($result && mysqli_affected_rows($dbconnection)){
                echo "<br><div class=\"alert alert-success alarm\">Item added successfully!</div>";
            }
            else{
                echo "<br><div class=\"alert alert-danger alarm\">Could not add item!</div>";
            }
        }
        else{
            die("<br><div class=\"alert alert-danger alarm\">Invalid form!</div>");
        }
    }
    include('form.php');
    include('footer.php');
?>