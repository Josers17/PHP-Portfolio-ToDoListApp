<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    <!-- Form to add new tasks -->
    <form action="index.php" method="POST">
        <input type="text" name="task" placeholder="Write a task..." required>
        <button type="submit" name="submit">Add</button>
    </form>

    <!-- Task list -->
    <ul>
        <?php
        if (isset($_POST['submit'])) 
        {
            $task = $_POST['task'];
            $sql = "INSERT INTO tasks (task) VALUES ('$task')";
            $conn->query($sql);
            header("Location: index.php");
            exit();
        }

        if (isset($_GET['delete'])) 
        {
            $id = $_GET['delete'];
            $sql = "DELETE FROM tasks WHERE id=$id";
            $conn->query($sql);
            header("Location: index.php"); 
            exit();
        }

        $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()) 
        {
            echo "<li>" . $row['task'] . " <a href='index.php?delete=" . $row['id'] . "'>Delete</a></li>";
        }
        ?>
    </ul>
</body>
</html>
