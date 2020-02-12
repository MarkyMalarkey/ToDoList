/* This is the php page that processes a new item being added to the list. */


<?php
    require_once('database.php');
    $mys = new mysqli("localhost","mgs_user","pa55word","todolist");
    session_start();
    if (isset($_POST['submit'])) { //Once submit is hit on additem.php, this code runs.
        $title = $_POST['Title']; //The title is passed from additem.php on click
        $q = "INSERT INTO todoitems (Title) VALUES ('$title')"; //then the title is added to the database
        $result = mysqli_query($mys, $q); //runs the query
        header('location: index.php');//returns to index

    } else if (isset($_POST['delete'])) {//Once delete is hit, this code runs. The only page with delete is index.php
        $row['Title'] = $_SESSION['t']; //I pass the title from the index using Session
        $q2 = "DELETE FROM todoitems WHERE todoitems.Title ='".$row['Title']."' "; //I delete the title matching the ont that is passed from the database
        $result2 = mysqli_query($mys, $q2); //runs the query
        header('location: index.php'); //returns to index
    }
?>
