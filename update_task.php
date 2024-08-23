<?php
$id = $_POST['id'];

$conn = new mysqli('localhost', 'root', '', 'todo_app');

$sql = "UPDATE tasks SET status='done' WHERE id=$id";
$conn->query($sql);
?>
