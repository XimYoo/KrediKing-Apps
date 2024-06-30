<?php
// Initialize database connection
$koneksi = new mysqli('localhost', 'root', '', 'KrediKing');

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Query to get the sum of transactions per category
$query = "SELECT category, SUM(amount) AS total_amount FROM transactions GROUP BY category";
$result = $koneksi->query($query);

// Format data for Chart.js
$pieData = [];
$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['category'];
    $data[] = $row['total_amount'];
}

$pieData['labels'] = $labels;
$pieData['datasets'] = [
    [
        'data' => $data,
        'backgroundColor' => [
            '#FFB6C1', // Light Pink
            '#FFA07A', // Light Salmon
            '#FFD700', // Gold
            '#98FB98', // Pale Green
            '#87CEFA', // Light Sky Blue
            '#9370DB'  // Medium Purple
        ]
    ]
];

// Return data in JSON format
echo json_encode($pieData);

$koneksi->close();
?>
