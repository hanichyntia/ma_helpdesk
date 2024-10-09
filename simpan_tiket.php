<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $kode_tiket = $stmt->insert_id;
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
    $subkategori = isset($_POST['subkategori']) ? $_POST['subkategori'] : '';
    $subsubkategori = isset($_POST['subsubkategori']) ? $_POST['subsubkategori'] : '';
    $keluhan = isset($_POST['keluhan']) ? $_POST['keluhan'] : '';
    $reset_email = isset($_POST['reset_email']) ? $_POST['reset_email'] : '';
    $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $tanggal_transaksi = isset($_POST['tanggal_transaksi']) ? $_POST['tanggal_transaksi'] : date('Y-m-d H:i:s');


    if (empty($email) || empty($kategori) || empty($subkategori) || empty($subsubkategori) || empty($keluhan) || empty($nim) || empty($nama)) {
        header('Location: tiket.php?status=error&message=Harap%20isi%20semua%20data%20yang%20diperlukan');
        exit();
    }

    $id_status_tiket = 1;
    $id_rating = 0;

    if ($subsubkategori == 2) {
        $recipient_email = $reset_email;
    } else {
        $recipient_email = $email;
    }

    $stmt = $conn->prepare("INSERT INTO transaksi_tiket (email, id_kodefikasi_tiket, id_sub_kodefikasi_tiket, id_sub_sub_kodefikasi, id_status_tiket, id_rating, keluhan, reset_email, nim, nama, tanggal_transaksi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        header('Location: tiket.php?status=error&message=Gagal%20menambahkan%20tiket:%20' . urlencode($conn->error));
        exit();
    }

    $stmt->bind_param("siiiisssss", $email, $kategori, $subkategori, $subsubkategori, $id_status_tiket, $id_rating, $keluhan, $reset_email, $nim, $nama);

    if ($stmt->execute()) {
        $id_transaksi_tiket = $stmt->insert_id;

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
            $kode_tiket = $id_transaksi_tiket;
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

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'donotreply.uptsi@gmail.com'; 
            $mail->Password = 'bvfq vrcb hovo pjdu'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('donotreply.uptsi@gmail.com', 'UPTSI');
            $mail->addAddress($recipient_email);

            $mail->addEmbeddedImage('uploads/logo.png', 'logo_image');
            $mail->addEmbeddedImage('uploads/checklist.png', 'checklist_image');

            $mail->isHTML(true);
            $mail->Subject = 'Tiket Berhasil Terkirim';
            $mail->Body = '
<div style="text-align:center; margin-top:20px;">
    <img src="cid:checklist_image" alt="logo" style="width:200px; height:auto;">
</div>
<div style="text-align: center; width: 400px; margin: 0 auto;">
    <b style="font-size: 18px;">Tiket Anda Telah Terkirim!</b>
    <p style="text-align: justify;">
        Terima kasih telah mengirimkan tiket. Kode tiket Anda adalah <strong>' . $kode_tiket . '</strong>.<br>
        Tiket Anda sedang diproses. Harap menunggu balasan dari Unit Sistem Informasi dan Pusat Data.<br><br>
        Jika belum ada respon balasan dari Unit Sistem Informasi dan Pusat Data, silakan kunjungi ruangan Unit Sistem Informasi dan Pusat Data di Gedung Rektorat lantai 1.
    </p>
</div>
<div style="margin-top: 2rem; width: 300px;">
    <img src="cid:logo_image" alt="logo" style="width:150px; height:auto;"><br>
    <b>Unit Sistem Informasi dan Pusat Data Universitas Ma Chung</b><br>
    E-mail   : uptsisteminformasi@machung.ac.id<br>
    Address  : Villa Puncak Tidar Blok N No. 01 Malang
</div>
';

            $mail->send();

            $mail->clearAddresses();
            $mail->clearAttachments();

            $mail->addAddress('donotreply.uptsi@gmail.com');
            $mail->Subject = 'Tiket Baru Telah Masuk - [' . $kode_tiket . ']';
            $mail->Body = "<p>Hi Unit Sistem Informasi dan Pusat Data, berikut kami sampaikan detail dari data pengirim tiket:</p>
<p>Kode tiket: <strong>$kode_tiket</strong></p>
<p>Kategori: <strong>$kategori</strong></p>
<p>Subkategori: <strong>$subkategori</strong></p>
<p>Sub-subkategori: <strong>$subsubkategori</strong></p>
<p>Nama: <strong>$nama</strong></p>
<p>NIM/NIP: <strong>$nim</strong></p>
<p>Keluhan: <strong>$keluhan</strong></p>
<p>Email Machung: <strong>$email</strong></p>
<p>Email Alternatif: <strong>$reset_email</strong></p>
<p>Tanggal Transaksi: <strong>$tanggal_transaksi</strong></p>";

            $mail->send();

            header('Location: tiket.php?status=success&message=Sukses%20menambahkan%20tiket%20dan%20mengirim%20email');
        } catch (Exception $e) {
            header('Location: tiket.php?status=error&message=Error%20mengirim%20email:%20' . urlencode($mail->ErrorInfo));
        }
    } else {
        header('Location: tiket.php?status=error&message=Gagal%20menambahkan%20tiket:%20' . urlencode($stmt->error));
    }

    $stmt->close();
    $conn->close();
    exit();
}
