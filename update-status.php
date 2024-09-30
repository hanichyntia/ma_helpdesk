<?php
include "config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_tiket = $_GET['id'] ?? '';
    $status_tiket = $_POST['id_status_tiket'] ?? '';
    $respon_admin = $_POST['respon_admin'] ?? '';


    $stmt = $conn->prepare("UPDATE transaksi_tiket SET id_status_tiket = ?, respon_admin = ? WHERE id_transaksi_tiket = ?");
    
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param("isi", $status_tiket, $respon_admin, $id_tiket);

    if ($stmt->execute()) {
        echo "<script>alert('Status tiket berhasil diperbarui.');</script>";
        header("Location: respon-tiket.php?status=success");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.');</script>";
    header("Location: respon-tiket.php");
    exit();
}
?>
