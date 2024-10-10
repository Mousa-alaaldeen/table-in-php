<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
<?php
include('config.php');

try {
    $sql = 'SELECT id, firstName, email FROM studentes'; 
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($result) > 0) {
        echo '<div class="container mt-4">
                <h2>Student List</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                    // htmlspecialchars php ====>html
        foreach ($result as $row) {
            echo '<tr>
                    <td>' . htmlspecialchars($row['id']) . '</td>
                    <td>' . htmlspecialchars($row['firstName']) . '</td>
                    <td>' . htmlspecialchars($row['email']) . '</td>
                    <td>
                        <a href="edit.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this record?\');">Delete</a>
                    </td>
                </tr>';
        }
        
        echo '</tbody></table></div>';
    } else {
        echo '<div class="alert alert-warning">No records found.</div>';
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
}
?>

</body>
</html>
