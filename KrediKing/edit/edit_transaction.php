<?php
// Inisialisasi koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'KrediKing');

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Periksa apakah parameter 'id' telah diberikan
if (isset($_GET['id'])) {
    // Ambil ID dari record yang akan diupdate
    $id = intval($_GET['id']); // Pastikan ID adalah integer untuk keamanan

    // Query SQL untuk mengambil data transaction berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM transactions WHERE id='$id'");
    $view = mysqli_fetch_array($query);

    // Jika data transaction ditemukan
    if ($view) {
?>
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Update Transaction</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="GET" action="update_transaction.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Credit Card ID</label>
                                        <input type="number" class="form-control" name="credit_card_id" placeholder="Enter Credit Card ID" value="<?php echo $view['credit_card_id']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="datetime-local" class="form-control" name="date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($view['date'])); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" step="0.01" class="form-control" name="amount" placeholder="Enter Amount" value="<?php echo $view['amount']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Enter Description" value="<?php echo $view['description']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" class="form-control" name="category" placeholder="Enter Category" value="<?php echo $view['category']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Created At</label>
                                        <input type="text" class="form-control" name="created_at" value="<?php echo $view['created_at']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-sm btn-info">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
<?php
    } else {
        echo "Data not found.";
    }
} else {
    echo "ID not provided.";
}

// Tutup koneksi database
$koneksi->close();
?>
