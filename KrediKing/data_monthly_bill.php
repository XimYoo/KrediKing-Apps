<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Monthly Bills DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                            Add Monthly Bill
                        </button>
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Credit Card ID</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th> <!-- New column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = 0;
                                $query = mysqli_query($koneksi, "SELECT * FROM monthly_bills");
                                while ($bill = mysqli_fetch_array($query)) {
                                    $id++;
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $bill['credit_card_id']; ?></td>
                                        <td><?php echo $bill['amount']; ?></td>
                                        <td><?php echo $bill['due_date']; ?></td>
                                        <td><?php echo $bill['status']; ?></td>
                                        <td><?php echo $bill['created_at']; ?></td>
                                        <td>
                                            <a href="delete_bill.php?id=<?php echo $bill['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                            <a href="index.php?page=edit-bill&id=<?php echo $bill['id']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to update this item?')">Update</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Credit Card ID</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
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
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Monthly Bill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="add/tambah_bill.php">
                    <div class="form-group">
                        <label for="credit_card_id">Credit Card ID</label>
                        <input type="number" class="form-control" id="credit_card_id" placeholder="Enter Credit Card ID" name="credit_card_id" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" placeholder="Enter Amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Unpaid">Unpaid</option>
                            <option value="Paid">Paid</option>
                        </select>
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
