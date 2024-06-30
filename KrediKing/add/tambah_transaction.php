<?php
$koneksi = new mysqli('localhost', 'root', '', 'KrediKing');
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $credit_card_id = mysqli_real_escape_string($koneksi, $_GET['credit_card_id']);
    $date = mysqli_real_escape_string($koneksi, $_GET['date']);
    $amount = mysqli_real_escape_string($koneksi, $_GET['amount']);
    $description = mysqli_real_escape_string($koneksi, $_GET['description']);
    $category = mysqli_real_escape_string($koneksi, $_GET['category']);
    
    $query = "INSERT INTO transactions (credit_card_id, date, amount, description, category, created_at) VALUES ('$credit_card_id', '$date', '$amount', '$description', '$category', NOW())";
    
    if (mysqli_query($koneksi, $query)) {
        header('Location: ../index.php?page=data-transaction'); // Redirect to the transactions page after successful insertion
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

$koneksi->close();
?>
