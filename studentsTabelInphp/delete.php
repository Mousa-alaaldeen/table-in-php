<?php
include('config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'DELETE FROM studentes WHERE id = :id';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(['id' => $id])) {
        echo 'Record deleted successfully.';
    } else {
        echo 'Error deleting record.';
    }
    header('Location: index.php');
    exit();
} else {
    echo 'Invalid request. No ID provided.';
}
?>
