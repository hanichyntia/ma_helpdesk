<?php
session_start();
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header('location: login-hlp.php');
    exit();
}

$id_user = $_SESSION['id_user'];

include "config.php";

$stmt = $conn->prepare("SELECT hak_akses_user FROM master_user WHERE id_user = ?");
if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("User not found.");
}

$user_data = $result->fetch_assoc();
$user_role = $user_data['hak_akses_user'];

$id_sub_sub_kodefikasi_tiket = isset($_GET['id_sub_sub_kodefikasi_tiket']) ? intval($_GET['id_sub_sub_kodefikasi_tiket']) : 0;

// Check role and redirect based on the value of id_sub_sub_kodefikasi_tiket
if ($user_role === 'Mahasiswa') {
    if ($id_sub_sub_kodefikasi_tiket === 26) {
        header("Location: faq-mahasiswa.php?id_sub_sub_kodefikasi_tiket=" . $id_sub_sub_kodefikasi_tiket);
        exit();
    } else {
        header("Location: tiket.php");
        exit();
    }
} elseif ($user_role === 'Dosen') {
    if ($id_sub_sub_kodefikasi_tiket === 29) {
        header("Location: faq-dosen.php?id_sub_sub_kodefikasi_tiket=" . $id_sub_sub_kodefikasi_tiket);
        exit();
    }else {
        header("Location: tiket.php");
        exit();
    }
}

// Redirect to tiket.php if the user role is neither 'Mahasiswa' nor 'Dosen'
header("Location: tiket.php");
exit();
?>