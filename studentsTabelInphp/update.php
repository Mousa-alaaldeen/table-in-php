<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $sql = 'UPDATE studentes SET firstName = :firstName, email = :email WHERE id = :id';
    $stmt = $conn->prepare($sql);
    
    try {
        $stmt->execute([
            'firstName' => $firstName,
            'email' => $email,
            'id' => $id
        ]);
        echo 'Record updated successfully.';
    } catch (PDOException $e) {
       
        echo 'Error updating record: ' . $e->getMessage();
    }

   
    header('Location: index.php');
    exit();
}
?>
