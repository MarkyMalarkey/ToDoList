<?php
    require_once('database.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>To do list</title>
    </head>
    <body>
        <form method="POST" action="process.php"> <!--A simple form that sends the title to process.php-->
            <h1>Title:</h1>
            <input type="text" name="Title" required>
            <button type="submit" name="submit"> Add</button>
        </form>
    </body>
</html> 