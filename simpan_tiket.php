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
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Bind parameters dan eksekusi query
    $stmt->bind_param("siiiisssss", $email, $kategori, $subkategori, $subsubkategori, $id_status_tiket, $id_rating, $keluhan, $reset_email, $nim, $nama);

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
            $nama = $data['nama'];
            $nim = $data['nim'];
            $keluhan = $data['keluhan'];
            $email = $data['email'];
            $reset_email = $data['reset_email'];
            $tanggal_transaksi = $data['tanggal_transaksi'];
        } else {
            die("Data tidak ditemukan.");
        }

        $stmtGet->close();

        // Kirim email menggunakan PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Setup seperti sebelumnya
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kazushi0890@gmail.com';
            $mail->Password = 'hodr mljy jkyq uqyo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Pengirim dan penerima
            $mail->setFrom('admin@gmail.com', 'Admin');
            $mail->addAddress($recipient_email);  // Kirim ke email pengguna

            // Menambahkan gambar yang akan disematkan
            $mail->addEmbeddedImage('uploads/logo.png', 'logo_image'); // Sesuaikan path gambar
            $mail->addEmbeddedImage('uploads/checklist.png', 'checklist_image'); // Sesuaikan path gambar

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
            echo "<script>alert('Error: {$mail->ErrorInfo}');location.href='lihat-tiket.php';</script>";
        }
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
