<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = $_POST['kategori'] ?? '';
    $subkategori = $_POST['subkategori'] ?? '';
    $subsubkategori = $_POST['subsubkategori'] ?? '';
    $keluhan = $_POST['keluhan'] ?? '';

    if (empty($kategori) || empty($subkategori) || empty($subsubkategori) || empty($keluhan)) {
        echo "<script>alert('Semua field harus diisi.');</script>";
        header("Location: login-hlp.php?status=gagal");
        exit();
    }

    $id_status_tiket = 1;
    $id_rating = 0;

    $stmt = $conn->prepare("INSERT INTO transaksi_tiket (id_user, id_kodefikasi_tiket, id_sub_kodefikasi_tiket, id_sub_sub_kodefikasi, id_status_tiket, id_rating, keluhan, tanggal_transaksi) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param("iiiiiss", $id_user, $kategori, $subkategori, $subsubkategori, $id_status_tiket, $id_rating, $keluhan);

  

    $stmt->close();
}

$conn->close();
?>