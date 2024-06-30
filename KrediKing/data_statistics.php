<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pie Chart</title>
    <!-- Add Chart.js and jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .card-header {
            background-color: #f8f9fa; /* Soft grey background */
            color: #343a40; /* Dark grey text */
        }
        .btn-tool {
            color: #343a40; /* Dark grey icons */
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin-top: 20px;
        }
        .card {
            width: 50%;
        }
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Spending Categories</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(function () {
    // Load data from PHP
    $.get('getData.php', function (pieData) {
        pieData = JSON.parse(pieData);

        // Settings for pie chart
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        };

        // Create pie chart
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        });
    });
});
</script>
</body>
</html>
