<?php include('header.php'); ?>
<a href="index.php"><button type="button" class="btn btn-light space">Back to home</button></a>
<hr>
<h2 class="text-white">Edit an item</h2>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        (isset($_GET['id']) && is_numeric($_GET['id'])) ? $id = $_GET['id'] : die("<br><div class=\"alert alert-danger alarm\">Invalid request!</div>");
        $edit = true;
        $result = mysqli_query($dbconnection,"SELECT * FROM dict WHERE id=".$id.";");
        while ($row = mysqli_fetch_assoc($result)){
            $item_id = $row['id'];
            $item_key = $row['key_text'];
            $item_value = $row['value_text'];
            $item_date = $row['created_at'];
        }
        include('form.php');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!empty($_POST)){
            if (is_numeric($_POST['id'])){
                $id = $_POST['id'];
            }
            else{
                die("<br><div class=\"alert alert-danger alarm\">Invalid form!</div>");
            }
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
                $result = mysqli_query($dbconnection,"UPDATE dict SET key_text='".$key."',value_text='".$value."' WHERE id=".$id.";");
            }
            else{
                die("<br><div class=\"alert alert-danger alarm\">Invalid form!</div>");
            }
            if ($result && mysqli_affected_rows($dbconnection)){
                echo "<br><div class=\"alert alert-success alarm\">Item edited successfully!</div>";
            }
            else{
                echo "<br><div class=\"alert alert-danger alarm\">Could not edit item!</div>";
            }
        }
        else{
            die("<br><div class=\"alert alert-danger alarm\">Invalid form!</div>");
        }
    }
    include('footer.php');
?>