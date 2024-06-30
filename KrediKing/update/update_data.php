<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Retrieve the input values from the form
    $id = $_GET['id'];
    $limit = $_GET['limit'];
    $balance = $_GET['balance'];

    // Validate the input values
    // (Add your validation code here if needed)

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'KrediKing');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the data in the database
    $sql = "UPDATE credit_cards SET `limit`='$limit', balance='$balance' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?page=data-Credit-Card');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
