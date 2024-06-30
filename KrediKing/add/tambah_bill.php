<?php
// Inisialisasi koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'KrediKing');

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Fungsi untuk mengirim pesan Telegram
function sendTelegramMessage($chatId, $message) {
    $botToken = "7249048357:AAHRXt3P4uTadnQZr088Q2jBpIKXvF7E7To";
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

// Check request method
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve and sanitize form inputs
    $credit_card_id = mysqli_real_escape_string($koneksi, $_GET['credit_card_id']);
    $amount = mysqli_real_escape_string($koneksi, $_GET['amount']);
    $due_date = mysqli_real_escape_string($koneksi, $_GET['due_date']);
    $status = mysqli_real_escape_string($koneksi, $_GET['status']);

    // Insert into database
    $query = "INSERT INTO monthly_bills (credit_card_id, amount, due_date, status, created_at) VALUES ('$credit_card_id', '$amount', '$due_date', '$status', NOW())";

    if (mysqli_query($koneksi, $query)) {
        // Success, send Telegram message
        $chatId = "1202628438";
        $message = "New Monthly Bill Added:\nCredit Card ID: $credit_card_id\nAmount: $amount\nDue Date: $due_date\nStatus: $status";
        sendTelegramMessage($chatId, $message);

        // Redirect or show success message
        header('Location: ../index.php?page=data-monthly-bill'); // Redirect to your desired page after successful insertion
        exit;
    } else {
        // Handle insert error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Close the connection
$koneksi->close();
?>
