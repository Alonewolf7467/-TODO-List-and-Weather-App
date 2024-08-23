<?php
$task = $_POST['task'];

$conn = new mysqli('localhost', 'root', '', 'todo_app');

$sql = "INSERT INTO tasks (task) VALUES ('$task')";
$conn->query($sql);

header('Location: index.php');
?>
