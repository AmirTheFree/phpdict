</center>
</div>
<script src="lib/js/jquery-3.5.1.slim.min.js"></script>
<script src="lib/js/bootstrap.bundle.min.js"></script>
</body>

<?php 
    if(isset($result) && $result){mysqli_free_result($result);};
    mysqli_close($dbconnection);
?>

</html>