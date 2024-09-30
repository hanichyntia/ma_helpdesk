<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include "config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_tiket = $_GET['id'] ?? '';
    $status_tiket = $_POST['id_status_tiket'] ?? '';
    $respon_admin = $_POST['respon_admin'] ?? '';

    $stmt = $conn->prepare("SELECT email, reset_email, id_sub_sub_kodefikasi FROM transaksi_tiket WHERE id_transaksi_tiket = ?");
    $stmt->bind_param("i", $id_tiket);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $email = $row['email'] ?? '';
    $reset_email = $row['reset_email'] ?? '';
    $id_sub_sub_kodefikasi = $row['id_sub_sub_kodefikasi'] ?? 0;

    if ($id_sub_sub_kodefikasi == 2) {
        $recipient_email = $reset_email;
    } else {
        $recipient_email = $email;
    }

    $stmt = $conn->prepare("UPDATE transaksi_tiket SET id_status_tiket = ?, respon_admin = ? WHERE id_transaksi_tiket = ?");
    
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param("isi", $status_tiket, $respon_admin, $id_tiket);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; //smtp.office365.com (outlook)
            $mail->SMTPAuth = true;
            $mail->Username = 'kazushi0890@gmail.com'; 
            $mail->Password = 'cmsgetlpgyomcolp'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('no-reply@gmail.com', 'Admin');
            $mail->addAddress($recipient_email);

            $mail->isHTML(true);
            $mail->Subject = 'Status Tiket Diperbarui';
            $mail->Body = "Status tiket Anda telah diperbarui. Respon admin: $respon_admin";

            $mail->send();
            echo "<script>alert('Status tiket berhasil diperbarui dan email telah dikirim.');</script>";
            header("Location: respon-tiket.php?status=success");
            exit();
        } catch (Exception $e) {
            $errorMessage = "Status tiket berhasil diperbarui tetapi email tidak dapat dikirim. Error: {$mail->ErrorInfo}";
            echo "<script>alert('$errorMessage');</script>";
        }
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
