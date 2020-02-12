# ToDoList
A simple working PHP to do list that allows a user to add a task to a SQL database table.

For creating a task, the program order is:
index.php (to access the add item page) --> additem.php (to add the item and call the process page)  --> process.php (processes the request and returns the user to the index page)

For deleting a task, the program order is:
index.php (clicking the delete button passes the title to the process page) --> process.php (actually deletes the item from the database then returns the user to the index)
