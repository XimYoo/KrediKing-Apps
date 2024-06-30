<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Retrieve the input values from the form
    $user_id = $_GET['user_id'];
    $number = $_GET['number'];
    $name = $_GET['name'];
    $expiration_date = $_GET['expiration_date'];
    $cvv = $_GET['cvv'];
    $limit = $_GET['limit'];
    $balance = $_GET['balance'];

    // Validate the input values
    // (Add your validation code here)

    // Database connection
    $conn = new mysqli('localhost','root','','KrediKing');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the data into the database
    $sql = "INSERT INTO credit_cards (user_id, number, name, expiration_date, cvv, `limit`, balance) 
            VALUES ('$user_id', '$number', '$name', '$expiration_date', '$cvv', '$limit', '$balance')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../index.php?page=data-Credit-Card');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
