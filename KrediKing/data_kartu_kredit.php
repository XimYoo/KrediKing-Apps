<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Credit Cards DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                            Add Credit Card
                        </button>
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Expiration Date</th>
                                    <th>CVV</th>
                                    <th>Limit</th>
                                    <th>Balance</th>
                                    <th>Created At</th>
                                    <th>Action</th> <!-- New column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = 0;
                                $query = mysqli_query($koneksi, "SELECT * FROM credit_cards");
                                while ($crd = mysqli_fetch_array($query)) {
                                    $id++;
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $crd['user_id']; ?></td>
                                        <td><?php echo $crd['number']; ?></td>
                                        <td><?php echo $crd['name']; ?></td>
                                        <td><?php echo $crd['expiration_date']; ?></td>
                                        <td><?php echo $crd['cvv']; ?></td>
                                        <td><?php echo $crd['limit']; ?></td>
                                        <td><?php echo $crd['balance']; ?></td>
                                        <td><?php echo $crd['created_at']; ?></td>
                                        <td>
                                            <a href="delete_data.php?id=<?php echo $crd['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                            <a href="index.php?page=edit-data&& id=<?php echo $crd['id']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to update this item?')">Update</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Expiration Date</th>
                                    <th>CVV</th>
                                    <th>Limit</th>
                                    <th>Balance</th>
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
                <h4 class="modal-title">Add Credit Card</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="add/tambah_data.php">
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input type="number" class="form-control" id="user_id" placeholder="Enter User ID" name="user_id">
                    </div>
                    <div class="form-group">
                        <label for="number">Card Number</label>
                        <input type="text" class="form-control" id="number" placeholder="Enter Card Number" name="number" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name on Card</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name on Card" name="name">
                    </div>
                    <div class="form-group">
                        <label for="expiration_date">Expiration Date</label>
                        <input type="date" class="form-control" id="expiration_date" name="expiration_date">
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" placeholder="Enter CVV" name="cvv">
                    </div>
                    <div class="form-group">
                        <label for="limit">Credit Limit</label>
                        <input type="number" step="0.01" class="form-control" id="limit" placeholder="Enter Credit Limit" name="limit">
                    </div>
                    <div class="form-group">
                        <label for="balance">Balance</label>
                        <input type="number" step="0.01" class="form-control" id="balance" placeholder="Enter Balance" name="balance">
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