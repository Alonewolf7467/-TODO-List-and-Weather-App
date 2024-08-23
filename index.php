<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .task-card {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 text-center">To-Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="taskForm" action="add_task.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="task" placeholder="Enter new task" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add Task</button>
                        </form>
                    </div>
                </div>
                <div id="taskList">
                    <?php include 'fetch_tasks.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function markAsDone(id) {
            $.post('update_task.php', { id: id }, function(response) {
                $('#task-' + id).addClass('bg-success text-white').removeClass('bg-light');
                $('#done-btn-' + id).prop('disabled', true);
            });
        }

        function deleteTask(id) {
            $.post('delete_task.php', { id: id }, function(response) {
                $('#task-' + id).remove();
            });
        }
    </script>
</body>
</html>
