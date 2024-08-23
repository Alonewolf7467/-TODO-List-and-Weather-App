<?php
$conn = new mysqli('localhost', 'root', '', 'todo_app');

$sql = "SELECT * FROM tasks ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $task_id = $row['id'];
        $task = $row['task'];
        $status = $row['status'];
        $card_class = $status == 'done' ? 'bg-success text-white' : 'bg-light';
        $btn_disabled = $status == 'done' ? 'disabled' : '';

        echo "
        <div class='card task-card $card_class' id='task-$task_id'>
            <div class='card-body'>
                <h5 class='card-title'>$task</h5>
                <button onclick='markAsDone($task_id)' class='btn btn-warning' id='done-btn-$task_id' $btn_disabled>Mark as Done</button>
                <button onclick='deleteTask($task_id)' class='btn btn-danger'>Delete</button>
            </div>
        </div>";
    }
}
?>
