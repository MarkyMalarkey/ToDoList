<?php

/*This is a simple to do list program using PHP and a SQL database.
    Mark Norfolk
    2/12/2020
    INF 652 VA 
*/


    require_once('database.php');
    $mys = new mysqli("localhost","mgs_user","pa55word","todolist");
    $query = "SELECT * FROM todoitems";
    $result = mysqli_query($mys, $query);
    session_start();

    //prompts the user to add a task if one isn't already present
    if (mysqli_num_rows($result) == 0) { 
        ?> <h1>No to do list item exist yet, click below to add an item.</h1><?php
    } else {
        ?> <h1>Click below to add a new item to the list.</h1><?php
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>To do list</title>
    </head>
    <body>
        <h1>To do list app</h1>
        <form method="POST" action="additem.php">
            <button type="submit" name="submit"> Add item </button> 
            <!-- once the button is hit, it goes to additem.php-->
        </form>
        
        <table>
            <thead>
                <tr>
                    <!-- A simple table for formatting-->
                    <th>#</th>
                    <th>Tasks</th>
                    <th style="width: 60px;">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                // select all tasks if page is visited or refreshed
                $tasks = mysqli_query($mys, "SELECT * FROM todoitems");
                /*Even though the number on the database is way higher due to my testing,
                I start the list number as 1. Then once more items are added, it increases. */
                $i = 1;
                while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td> <?php echo $i;?> </td> <!--Prints the item number -->
                        <td> 
                            <?php 
                                /*This prints out the title for the task and
                                and also sets it up to be pulled from process.php*/
                                echo $row['Title']; 
                                $_SESSION['t'] = $row['Title'];
                            ?> 
                        </td>
                        <td><form method="POST" action="process.php">
                        <!--Once the button is pressed, it runs the delete portion of process.php-->
                        <button type="submit" name="delete"> Remove item</button> </td>
                    </tr>
                <?php 
                    $i++; //Increases the next itemnum
                }
                     
                ?>	
            </tbody>
        </table>
    </body>
</html> 