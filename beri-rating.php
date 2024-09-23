<?php
session_start();
include "config.php";

if (!isset($_SESSION['status_login']) || !$_SESSION['status_login']) {
  echo "Anda harus login terlebih dahulu.";
  exit();
}
if (isset($_POST['submit_rating']) && isset($_POST['rating'])) {
  $rating = $_POST['rating'];
  $id_transaksi_tiket = intval($_GET['id']);
  var_dump($rating, $id_transaksi_tiket);
  $stmt = $conn->prepare("UPDATE transaksi_tiket SET rating = ? WHERE id_transaksi_tiket = ?");
  $stmt->bind_param("ii", $rating, $id_transaksi_tiket);

  if ($stmt->execute()) {
    echo "<script>alert('Terima kasih atas rating Anda!'); window.location.href = 'index.php';</script>";
  } else {
    echo "<script>alert('Gagal mengirim rating. Coba lagi.'); window.location.href = 'index.php';</script>";
  }

  $stmt->close();
} else {
  echo "Rating tidak valid.";
}
?>