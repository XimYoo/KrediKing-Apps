<?php
// Inisialisasi koneksi ke database
$koneksi = new mysqli('localhost','root','','KrediKing');

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_GET['id'])) {
    // Get the ID of the record to delete
    $id = intval($_GET['id']); // Pastikan ID adalah integer untuk keamanan

    // SQL to delete record
    $sql = "DELETE FROM monthly_bills WHERE id = $id";

    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    // Redirect back to the main page after deletion
    header("Location: index.php?page=data-monthly-bill");
    exit();
} else {
    echo "ID not provided.";
}

// Close the connection
$koneksi->close();
?>
