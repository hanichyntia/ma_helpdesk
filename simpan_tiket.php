<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $subkategori = $_POST['subkategori'] ?? '';
    $subsubkategori = $_POST['subsubkategori'] ?? '';
    $keluhan = $_POST['keluhan'] ?? '';
    $reset_email = $_POST['reset_email'];

    if (empty($email) || empty($kategori) || empty($subkategori) || empty($subsubkategori) || empty($keluhan)) {
        echo "<script>alert('Gagal Menambahkan');location.href='lihat-tiket.php';</script>";
        exit();
    }

     if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@machung.ac.id$/", $email)) {
        echo "<script>alert('Email harus menggunakan domain perusahaan (@machung.ac.id).');location.href=tiket.php;</script>";
        exit();
    }

    $id_status_tiket = 1;
    $id_rating = 0;

    $stmt = $conn->prepare("INSERT INTO transaksi_tiket (email, id_kodefikasi_tiket, id_sub_kodefikasi_tiket, id_sub_sub_kodefikasi, id_status_tiket, id_rating, keluhan, reset_email, tanggal_transaksi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Bind parameters
    $stmt->bind_param("siiiisss", $email, $kategori, $subkategori, $subsubkategori, $id_status_tiket, $id_rating, $keluhan, $reset_email);

    // Execute and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Sukses Menambahkan Tiket');location.href='lihat-tiket.php';</script>";
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
