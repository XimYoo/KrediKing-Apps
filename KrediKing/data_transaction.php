<?php
// Inisialisasi koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'KrediKing');

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Transactions DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                            Add Transaction
                        </button>
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Credit Card ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = 0;
                                $query = mysqli_query($koneksi, "SELECT * FROM transactions");
                                while ($transaction = mysqli_fetch_array($query)) {
                                    $id++;
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $transaction['credit_card_id']; ?></td>
                                        <td><?php echo $transaction['date']; ?></td>
                                        <td><?php echo $transaction['amount']; ?></td>
                                        <td><?php echo $transaction['description']; ?></td>
                                        <td><?php echo $transaction['category']; ?></td>
                                        <td><?php echo $transaction['created_at']; ?></td>
                                        <td>
                                            <a href="delete_transaction.php?id=<?php echo $transaction['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Credit Card ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="add/tambah_transaction.php">
                    <div class="form-group">
                        <label for="credit_card_id">Credit Card ID</label>
                        <input type="number" class="form-control" id="credit_card_id" placeholder="Enter Credit Card ID" name="credit_card_id" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="datetime-local" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" placeholder="Enter Amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
