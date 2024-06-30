<?php
// Inisialisasi koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'KrediKing');

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Periksa apakah parameter 'id' telah diberikan
if (isset($_GET['id'])) {
    // Ambil ID dari record yang akan dihapus
    $id = intval($_GET['id']); // Pastikan ID adalah integer untuk keamanan

    // SQL untuk menghapus record
    $sql = "DELETE FROM transactions WHERE id = $id";

    // Eksekusi query menghapus record
    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    // Redirect kembali ke halaman utama setelah penghapusan
    header("Location: index.php?page=data-transaction");
    exit();
} else {
    echo "ID not provided.";
}

// Tutup koneksi database
$koneksi->close();
?>
