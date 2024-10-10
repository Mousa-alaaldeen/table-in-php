<?php
include('config.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $sql = 'SELECT * FROM studentes WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($student) {
       
        ?>
        <h2>Edit Student Information</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($student['id']); ?>">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($student['firstName']); ?>"><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>"><br>
            
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo 'Record not found.';
    }
} else {
    echo 'Invalid request. No ID provided.';
}
?>
