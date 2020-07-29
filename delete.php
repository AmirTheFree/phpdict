<?php include('header.php'); ?>
<a href="index.php"><button type="button" class="btn btn-light space">Back to home</button></a>
<?php 
    if (is_numeric($_GET['id'])){
        $result = mysqli_query($dbconnection,"DELETE FROM dict WHERE id=".$_GET['id'].";");
        if ($result && mysqli_affected_rows($dbconnection)){
            echo "<br><div class=\"alert alert-success alarm\">Item deleted successfully!</div>";
        }
        else{
            echo "<br><div class=\"alert alert-danger alarm\">Could not delete item!</div>";
        }
    }
    else{
        die("<br><div class=\"alert alert-danger alarm\">Invalid request</div>");
    }
    include('footer.php');
?>