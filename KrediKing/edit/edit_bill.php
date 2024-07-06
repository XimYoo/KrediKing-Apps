<?php
$koneksi = new mysqli('localhost', 'root', '', 'KrediKing');
?>

<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM monthly_bills WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Update Monthly Bill</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="GET" action="update/update_data_bill.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Credit Card ID</label>
                                <input type="number" class="form-control" name="credit_card_id" placeholder="Enter Credit Card ID" value="<?php echo $view['credit_card_id']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" step="0.01" class="form-control" name="amount" placeholder="Enter Amount" value="<?php echo $view['amount']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Due Date</label>
                                <input type="date" class="form-control" name="due_date" value="<?php echo $view['due_date']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Unpaid" <?php echo ($view['status'] == 'Unpaid') ? 'selected' : ''; ?>>Unpaid</option>
                                    <option value="Paid" <?php echo ($view['status'] == 'Paid') ? 'selected' : ''; ?>>Paid</option>
                                </select>
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
