<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM credit_cards WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Update Credit Card</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="GET" action="update/update_data.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Credit Limit</label>
                                <input type="number" step="0.01" class="form-control" name="limit" placeholder="Enter Credit Limit" value="<?php echo $view['limit']; ?>" >
                                <input type="number" step="0.01" class="form-control" name="id" placeholder="Enter Credit Limit" value="<?php echo $view['id']; ?>" hidden>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Balance</label>
                                <input type="number" step="0.01" class="form-control" name="balance" placeholder="Enter Balance" value="<?php echo $view['balance']; ?>" >
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
