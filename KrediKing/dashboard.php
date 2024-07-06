<?php
// Mengambil data dari database
$query = mysqli_query($koneksi, "SELECT * FROM credit_cards");

$totalCreditLimit = 0;
$availableBalance = 0;
$totalDebt = 0;

while ($crd = mysqli_fetch_array($query)) {
    $totalCreditLimit += $crd['limit'];
    $availableBalance += $crd['balance'];
    $totalDebt += ($crd['limit'] - $crd['balance']);
}

// Mengambil data upcoming bills dari tabel monthly_bills
$upcomingBillsQuery = mysqli_query($koneksi, "SELECT SUM(amount) as total_upcoming_bills FROM monthly_bills WHERE status = 'Unpaid'");
$upcomingBillsResult = mysqli_fetch_array($upcomingBillsQuery);
$upcomingBills = $upcomingBillsResult['total_upcoming_bills'];

// Menentukan financial goals
$totalDebtGoal = 5000; // contoh tujuan total hutang
$payBillsGoal = 1000; // contoh tujuan pembayaran tagihan

$debtProgress = ($totalDebt / $totalDebtGoal) * 100;
$upcomingBillsProgress = ($upcomingBills / $payBillsGoal) * 100;
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- Total Credit Limit -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-credit-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Credit Limit</span>
                        <span class="info-box-number">$<?php echo number_format($totalCreditLimit, 2); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- Available Balance -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-wallet"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Available Balance</span>
                        <span class="info-box-number">$<?php echo number_format($availableBalance, 2); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <!-- Total Debt -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Debt</span>
                        <span class="info-box-number">$<?php echo number_format($totalDebt, 2); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- Upcoming Bills -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Upcoming Bills</span>
                        <span class="info-box-number">$<?php echo number_format($upcomingBills, 2); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Recap Report</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i></button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item">Action</a>
                                    <a href="#" class="dropdown-item">Another action</a>
                                    <a href="#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Expenses: 1 July, 2024 - 30 July, 2024</strong>
                                </p>

                                <div class="chart">
                                    <!-- Expenses Chart Canvas -->
                                    <canvas id="expensesChart" height="180" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Financial Goals</strong>
                                </p>

                                <div class="progress-group">
                                    Pay Bills
                                    <span class="float-right"><b><?php echo number_format($upcomingBills, 2); ?></b>/$<?php echo number_format($payBillsGoal, 2); ?></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: <?php echo $upcomingBillsProgress; ?>%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    Clear Debt
                                    <span class="float-right"><b><?php echo number_format($totalDebt, 2); ?></b>/$<?php echo number_format($totalDebtGoal, 2); ?></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: <?php echo $debtProgress; ?>%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->

        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var ctx = document.getElementById('expensesChart').getContext('2d');
  var expensesChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['1 July', '5 July', '10 July', '15 July', '20 July', '25 July', '30 July'],
      datasets: [{
        label: 'Total Debt',
        data: [0, <?php echo $totalDebt; ?>],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      },
      {
        label: 'Upcoming Bills',
        data: [0, <?php echo $upcomingBills; ?>],
        backgroundColor: 'rgba(255, 206, 86, 0.2)',
        borderColor: 'rgba(255, 206, 86, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });
});
</script>
