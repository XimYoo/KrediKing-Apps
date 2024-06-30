<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    // Get the ID of the record to delete
    $id = $_GET['id'];

    // Database connection
    $conn = new mysqli('localhost','root','','KrediKing');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to delete record
    $sql = "DELETE FROM credit_cards WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the connection
    $conn->close();

    // Redirect back to the main page after deletion
    header("Location: index.php?page=data-Credit-Card"); // Change index.php to your main page URL
    exit();
}
?>
