<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['task'])) {
    $toDelete = $_GET['task'];
    if (isset($_SESSION["todoList"])) {
        $todoList = $_SESSION["todoList"];
        $filteredTodoList = array_filter($todoList, function ($task) use ($toDelete) {
            return $task !== $toDelete;
        });
        $_SESSION["todoList"] = array_values($filteredTodoList); // Reset array keys after filtering
    }
}

header("Location: index.php"); // Redirect back to the main page
exit();
?>
