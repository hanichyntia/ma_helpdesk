<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = $_POST['kategori'];
    $subkategori = $_POST['subkategori'];
    $subsubkategori = $_POST['subsubkategori'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    
    $query = "INSERT INTO master_faq (id_kodefikasi_tiket, id_sub_kodefikasi_tiket, id_sub_sub_kodefikasi_tiket, judul, deskripsi) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiiss", $kategori, $subkategori, $subsubkategori, $judul, $deskripsi);
    $stmt->execute();
    $master_faq_id = $stmt->insert_id; 

    foreach ($_FILES as $key => $file) {
        if (strpos($key, 'dokumen') !== false && $file['error'] === UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($file['name']);
            move_uploaded_file($file['tmp_name'], $target_file);
            
            $query_detail = "INSERT INTO master_detail_faq (id_master_faq, text, file) VALUES (?, ?, ?)";
            $stmt_detail = $conn->prepare($query_detail);
            $stmt_detail->bind_param("iss", $master_faq_id, $_POST['keterangan' . str_replace('dokumen', '', $key)], $target_file);
            $stmt_detail->execute();
        }
    }

    header("Location: master-faq.php?status=success"); 
    exit;
}
?>
