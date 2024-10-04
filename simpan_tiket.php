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
    $nim = $_POST['nim'] ?? '';
    $nama = $_POST['nama'] ?? '';
    

    // Validasi input
    if (empty($email) || empty($kategori) || empty($subkategori) || empty($subsubkategori) || empty($keluhan)|| empty($nim)|| empty($nama)) {
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
    $stmt = $conn->prepare("INSERT INTO transaksi_tiket (email, id_kodefikasi_tiket, id_sub_kodefikasi_tiket, id_sub_sub_kodefikasi, id_status_tiket, id_rating, keluhan, reset_email, nim, nama, tanggal_transaksi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        // Redirect dengan pesan error jika query gagal
        header('Location: tiket.php?status=error&message=Gagal%20menambahkan%20tiket:%20' . urlencode($conn->error));
        exit();
    }

    // Bind parameters dan eksekusi query
    $stmt->bind_param("siiiisssss", $email, $kategori, $subkategori, $subsubkategori, $id_status_tiket, $id_rating, $keluhan, $reset_email, $nim, $nama);

    if ($stmt->execute()) {
        $id_transaksi_tiket = $stmt->insert_id;

        // Jika berhasil, kirim email
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kazushi0890@gmail.com';
            $mail->Password = 'hodr mljy jkyq uqyo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('admin@gmail.com', 'Admin');
            $mail->addAddress($recipient_email);

            $mail->addEmbeddedImage('uploads/logo.png', 'logo_image');
            $mail->addEmbeddedImage('uploads/checklist.png', 'checklist_image');

            $mail->isHTML(true);
            $mail->Subject = 'Status Tiket';

            // Body email dengan gambar disematkan menggunakan cid
            $mail->Body = '
            <div style="text-align:center; margin-top:20px;">
        <img src="cid:checklist_image" alt="logo" style="width:200px; height:auto;">
    </div>
    <div style="text-align: center; width: 400px; margin: 0 auto;">
        <b style="font-size: 18px;">Tiket Anda Telah Terkirim!</b>
        <p>
            Terimakasih telah mengirimkan tiket.
        Kode tiket anda <strong>'.$kode_tiket.'</strong>
            Tiket anda sedang diproses. Harap menunggu balasan dari Unit Sistem Informasi dan Pusat Data.
            Jika belum ada respon balasan dari Unit Sistem Informasi dan Pusat Data silahkan kunjungi ruangan Unit Sistem Informasi dan Pusat Data.
        </p>
    </div>
    <div style= "margin-top: 2rem; width: 300px;">
        <img src="cid:logo_image" alt="logo" style="width:150px; height:auto;"><br>
<b>Unit Sistem Informasi dan Pusat Data Universitas Ma Chung</b><br>
E-mail	: uptsisteminformasi@machung.ac.id
Address	: Villa Puncak Tidar Blok N No. 01 Malang
</div>
';


            $mail->send();

            // Reset semua pengaturan untuk email kedua
            $mail->clearAddresses();
            $mail->clearAttachments();

            // Kirim email ke SI dengan detail tiket
            $mail->addAddress('kazushi0890@gmail.com');
            $mail->Subject = 'Ada email masuk';
            $mail->Body    = "<p>Kode tiket: <strong>$kode_tiket</strong></p>
<p>Kategori: <strong>$kategori</strong></p>
<p>Subkategori: <strong>$subkategori</strong></p>
<p>Sub-subkategori: <strong>$subsubkategori</strong></p>
<p>Nama: <strong>$nama</strong></p>
<p>NIM: <strong>$nim</strong></p>
<p>Keluhan: <strong>$keluhan</strong></p>
<p>Email Machung: <strong>$email</strong></p>
<p>Email Alternatif: <strong>$reset_email</strong></p>
<p>Tanggal Transaksi: <strong>$tanggal_transaksi</strong></p>";

            $mail->send();

            echo "<script>alert('Sukses Menambahkan Tiket dan Mengirim Email');location.href='lihat-tiket.php';</script>";
        } catch (Exception $e) {
            // Redirect dengan pesan error jika gagal mengirim email
            header('Location: tiket.php?status=error&message=Error%20mengirim%20email:%20' . urlencode($mail->ErrorInfo));
        }
    } else {
        // Redirect dengan pesan error jika gagal mengeksekusi query
        header('Location: tiket.php?status=error&message=Gagal%20menambahkan%20tiket:%20' . urlencode($stmt->error));
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
