<?php

include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Use $_POST instead of $_GET for security
    $id_tiket = $_POST['id'] ?? ''; // Assuming the ID is being sent via a POST form field
    $status_tiket = $_POST['id_status_tiket'] ?? '';
    $respon_admin = $_POST['respon_admin'] ?? '';

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE transaksi_tiket SET id_status_tiket = ?, respon_admin = ? WHERE id_transaksi_tiket = ?");
    
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Bind parameters: 'i' for integer, 's' for string
    $stmt->bind_param("isi", $status_tiket, $respon_admin, $id_tiket);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Status tiket berhasil diperbarui.');location.href='respon-tiket.php';</script>";
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo "<script>alert('Invalid request.');location.href='respon-tiket.php';</script>";
    exit();
}

// Close the database connection
$conn->close();
?>