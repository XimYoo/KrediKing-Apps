<?php
// Periksa apakah metode permintaan adalah GET dan parameter yang diperlukan telah diset
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    // Mendapatkan dan membersihkan data input dari parameter URL
    $id = $_GET['id'];
    $credit_card_id = $_GET['credit_card_id'];
    $date = $_GET['date'];
    $amount = $_GET['amount'];
    $description = $_GET['description'];
    $category = $_GET['category'];

    // Validasi nilai input jika diperlukan

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'KrediKing');

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update data di database
    $sql = "UPDATE transactions SET credit_card_id='$credit_card_id', date='$date', amount='$amount', description='$description', category='$category' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman data transaksi jika berhasil
        header('Location: index.php?page=data-transaction');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
} else {
    echo "Error: ID parameter is missing or form method is incorrect.";
}
?>
