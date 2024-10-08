<?php
include "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_tiket = isset($_GET['id']) ? $_GET['id'] : '';
    $status_tiket = isset($_POST['id_status_tiket']) ? $_POST['id_status_tiket'] : '';
    $respon_admin = isset($_POST['respon_admin']) ? $_POST['respon_admin'] : '';

    $stmt = $conn->prepare("UPDATE transaksi_tiket SET id_status_tiket = ?, respon_admin = ? WHERE id_transaksi_tiket = ?");

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param("isi", $status_tiket, $respon_admin, $id_tiket);

    if ($stmt->execute()) {
        $email_query = $conn->prepare("SELECT email, keluhan, nama, nim, master_status_tiket.jenis_status_tiket FROM transaksi_tiket JOIN master_status_tiket ON master_status_tiket.id = transaksi_tiket.id_status_tiket WHERE id_transaksi_tiket = ?");
        $email_query->bind_param("i", $id_tiket);
        $email_query->execute();
        $email_result = $email_query->get_result();
        $data = $email_result->fetch_assoc();
        $user_email = isset($data['email']) ? $data['email'] : '';
        $keluhan = isset($data['keluhan']) ? $data['keluhan'] : '';
        $nama = isset($data['nama']) ? $data['nama'] : '';
        $nim = isset($data['nim']) ? $data['nim'] : '';
        $status = isset($data['jenis_status_tiket'])? $data['jenis_status_tiket'] : '';

        if ($user_email) {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kazushi0890@gmail.com';
                $mail->Password = 'hodr mljy jkyq uqyo';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('donotreply.uptsi@gmail.com', 'UPTSI');
                $mail->addAddress($user_email);

                $mail->addEmbeddedImage('uploads/logo.png', 'logo_image');

                $mail->isHTML(true);
                $mail->Subject = 'Respon Tiket';
                if ($status_tiket == 2) {
                    $mail->Body = '<div>
                                    <p>Halo ' . htmlspecialchars($nama) . ',</p>
                                    <p>Kami ingin memberi tahukan bahwa kami telah menerima dan memproses keluhan Anda. Berikut kami lampirkan detailnya:</p>
                                    <p><strong>Nama:</strong> ' . nl2br(htmlspecialchars($nama)) . '</p>
                                    <p><strong>NIM/NIP:</strong> ' . nl2br(htmlspecialchars($nim)) . '</p>
                                    <p><strong>Keluhan:</strong> ' . nl2br(htmlspecialchars($keluhan)) . '</p>
                                    <p><strong>Status Tiket:</strong> ' . nl2br(htmlspecialchars($status)) . '</p>
                                    <p>Jika Anda masih memiliki pertanyaan atau memerlukan bantuan lebih lanjut, jangan ragu untuk mengajukan tiket lain atau dapat dengan menghubungi Unit Sistem Informasi dan Pusat Data.</p>
                                  </div>
                                  <div style="margin-top: 2rem; width: 300px;">
                                    <img src="cid:logo_image" alt="logo" style="width:150px; height:auto;"><br>
                                    <b>Unit Sistem Informasi dan Pusat Data Universitas Ma Chung</b><br>
                                    E-mail   : uptsisteminformasi@machung.ac.id<br>
                                    Address  : Villa Puncak Tidar Blok N No. 01 Malang
                                  </div>';
                } elseif ($status_tiket == 3) {
                    $mail->Body = '<div>
                                    <p>Halo ' . htmlspecialchars($nama) . ',</p>
                                    <p>Kami ingin memberi tahukan bahwa kami telah menerima dan memproses keluhan Anda. Berikut kami lampirkan detailnya:</p>
                                    <p><strong>Nama:</strong> ' . nl2br(htmlspecialchars($nama)) . '</p>
                                    <p><strong>NIM/NIP:</strong> ' . nl2br(htmlspecialchars($nim)) . '</p>
                                    <p><strong>Keluhan:</strong> ' . nl2br(htmlspecialchars($keluhan)) . '</p>
                                    <p><strong>Status Tiket:</strong> ' . nl2br(htmlspecialchars($status)) . '</p>
                                    <p><strong>Respon dari Admin:</strong> ' . nl2br(htmlspecialchars($respon_admin)) . '</p>
                                    <p>Jika Anda masih memiliki pertanyaan atau memerlukan bantuan lebih lanjut, jangan ragu untuk mengajukan tiket lain atau dapat dengan menghubungi Unit Sistem Informasi dan Pusat Data.</p>
                                  </div>
                                  <div style="margin-top: 2rem; width: 300px;">
                                    <img src="cid:logo_image" alt="logo" style="width:150px; height:auto;"><br>
                                    <b>Unit Sistem Informasi dan Pusat Data Universitas Ma Chung</b><br>
                                    E-mail   : uptsisteminformasi@machung.ac.id<br>
                                    Address  : Villa Puncak Tidar Blok N No. 01 Malang
                                  </div>';
                }

                $mail->send();

                header('Location: respon-admin.php?id=' . $id_tiket . '&status=success&message=Sukses%20mengirim%20tiket%20ke%20email');
    exit();
            } catch (Exception $e) {
                header('Location: respon-admin.php?status=error&message=Error%20mengirim%20tiket');
    exit();
            }
        } else {
            header('Location: respon-admin.php?status=error&message=Email%20tidak%20ditemukan.');
            exit();
        }
    } else {
        header('Location: respon-admin.php?id=' . $id_tiket . '&status=error&message=Terjadi%20kesalahan%20saat%20mengupdate%20status.');
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.');</script>";
    header("Location: respon-tiket.php");
    exit();
}
