<?php
require 'vendor/autoload.php'; // Jika menggunakan Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = $_POST['email'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $subkategori = $_POST['subkategori'] ?? '';
    $subsubkategori = $_POST['subsubkategori'] ?? '';
    $keluhan = $_POST['keluhan'] ?? '';
    $reset_email = $_POST['reset_email'] ?? '';

    // Validasi input
    if (empty($email) || empty($kategori) || empty($subkategori) || empty($subsubkategori) || empty($keluhan)) {
        echo "<script>alert('Gagal Menambahkan');location.href='lihat-tiket.php';</script>";
        exit();
    }

    $id_status_tiket = 1;
    $id_rating = 0;

    // Tentukan alamat email berdasarkan id_sub_sub_kodefikasi
    if ($subsubkategori == 2) {
        $recipient_email = $reset_email; // Kirim ke reset_email jika id_sub_sub_kodefikasi == 2
    } else {
        $recipient_email = $email; // Jika tidak, kirim ke email biasa
    }

    // Prepare query untuk menambahkan tiket
    $stmt = $conn->prepare("INSERT INTO transaksi_tiket (email, id_kodefikasi_tiket, id_sub_kodefikasi_tiket, id_sub_sub_kodefikasi, id_status_tiket, id_rating, keluhan, reset_email, tanggal_transaksi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Bind parameters dan eksekusi query
    $stmt->bind_param("siiiisss", $email, $kategori, $subkategori, $subsubkategori, $id_status_tiket, $id_rating, $keluhan, $reset_email);

    if ($stmt->execute()) {
        // Ambil ID dari transaksi_tiket yang baru saja diinsert
        $id_transaksi_tiket = $stmt->insert_id;

        // Cek apakah data tiket yang baru berhasil ditambahkan
        $sql = "SELECT transaksi_tiket.*, 
        master_kodefikasi_tiket.name_kodefikasi_tiket, 
        master_sub_kodefikasi_tiket.nama_sub_kodefikasi_tiket, 
        master_sub_sub_kodefikasi_tiket.nama_sub_sub_kodefikasi_tiket, 
        master_status_tiket.jenis_status_tiket 
        FROM transaksi_tiket
        JOIN master_kodefikasi_tiket ON master_kodefikasi_tiket.id_kodefikasi_tiket = transaksi_tiket.id_kodefikasi_tiket
        JOIN master_sub_kodefikasi_tiket ON master_sub_kodefikasi_tiket.id_sub_kodefikasi_tiket = transaksi_tiket.id_sub_kodefikasi_tiket
        JOIN master_sub_sub_kodefikasi_tiket ON master_sub_sub_kodefikasi_tiket.id_sub_sub_kodefikasi_tiket = transaksi_tiket.id_sub_sub_kodefikasi
        JOIN master_status_tiket ON master_status_tiket.id = transaksi_tiket.id_status_tiket 
        WHERE id_transaksi_tiket = ?";
        
        $stmtGet = $conn->prepare($sql);
        $stmtGet->bind_param("i", $id_transaksi_tiket);
        $stmtGet->execute();
        $result = $stmtGet->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $kode_tiket = $id_transaksi_tiket; // ID tiket sebagai kode tiket
            $kategori = $data['name_kodefikasi_tiket'];
            $subkategori = $data['nama_sub_kodefikasi_tiket'];
            $subsubkategori = $data['nama_sub_sub_kodefikasi_tiket'];
            $keluhan = $data['keluhan'];
            $email= $data['email'];
            $reset_email= $data['reset_email'];
            $tanggal_transaksi = $data['tanggal_transaksi'];
        } else {
            die("Data tidak ditemukan.");
        }

        $stmtGet->close();

        // Kirim email menggunakan PHPMailer
        $mail = new PHPMailer(true);

try {
    // Pengaturan server
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';  // Outlook SMTP Server
    $mail->SMTPAuth = true;
    $mail->Username = 'hasbeenpeanut@outlook.com'; // Gunakan email lengkap
    $mail->Password = 'ivyahgugablloznn'; // Gunakan App Password
    $mail->SMTPSecure = 'tls';  // Gunakan TLS
    $mail->Port = 587;

    // Pengirim dan penerima
    $mail->setFrom('hasbeenpeanut@outlook.com', 'Admin');
    $mail->addAddress($recipient_email);  // Kirim ke email pengguna

    $mail->isHTML(true);
    $mail->Subject = 'Status Tiket';
    $mail->Body    = 'Terimakasih telah kirim tiket.<br> Tiket anda sedang diproses harap menunggu balasan email dari Sipusda.';

    $mail->send();

    // Reset semua pengaturan untuk email kedua
    $mail->clearAddresses();
    $mail->clearAttachments();

    // Kirim email ke SI dengan detail tiket
    $mail->addAddress('testmahasiswaumc7@student.machung.ac.id');
    $mail->Subject = 'Ada email masuk';
    $mail->Body    = "Kode tiket: $kode_tiket
Kategori: $kategori
Subkategori: $subkategori
Sub-subkategori: $subsubkategori
Keluhan: $keluhan
Email Machung: $email
Email Alternatif: $reset_email
Tanggal Transaksi: $tanggal_transaksi";

    $mail->send();

    echo "<script>alert('Sukses Menambahkan Tiket dan Mengirim Email');location.href='lihat-tiket.php';</script>";

} catch (Exception $e) {
    echo "<script>alert('Error: {$mail->ErrorInfo}');location.href='lihat-tiket.php';</script>";
}

    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
