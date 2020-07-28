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

<?php 
    include('dbinfo.php');
    $dbconnection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport);
        if (mysqli_connect_errno()){
            die("<div class=\"alert alert-danger alarm\">Could not connect to the database!</div>");
        }
?>

<body>
<div class="container-sm">
<center>
<h1 class="text-white space">PHP Dict</h1>