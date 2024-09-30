<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "helpdesk");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek jenis permintaan (kategori, subkategori, subsubkategori)
if (isset($_GET['type'])) {
    $type = $_GET['type'];

    if ($type == 'kategori') {
        $sql = "SELECT DISTINCT id_kodefikasi_tiket, nama_kodefikasi_tiket FROM transaksi_tiket";
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if ($type == 'subkategori' && isset($_GET['kategori_id'])) {
        $kategori_id = $_GET['kategori_id'];
        $sql = "SELECT DISTINCT id_sub_kodefikasi_tiket, nama_sub_kodefikasi_tiket FROM transaksi_tiket WHERE id_kodefikasi_tiket = '$kategori_id'";
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if ($type == 'subsubkategori' && isset($_GET['subkategori_id'])) {
        $subkategori_id = $_GET['subkategori_id'];
        $sql = "SELECT DISTINCT id_sub_sub_kodefikasi_tiket, nama_sub_sub_kodefikasi_tiket FROM transaksi_tiket WHERE id_sub_kodefikasi_tiket = '$subkategori_id'";
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}

$conn->close();
?>
