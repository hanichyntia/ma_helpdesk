<?php
include 'config.php';

if (isset($_GET['kategori'])) {
    $kategori_id = $_GET['kategori'];
    
    $qry_sub_kategori = mysqli_query($conn, "SELECT * FROM master_sub_kodefikasi_tiket WHERE id_kodefikasi_tiket='$kategori_id'");
    
    $subkategori_list = [];
    
    while ($data_sub_kategori = mysqli_fetch_array($qry_sub_kategori)) {
        $subkategori_list[] = [
            'id' => $data_sub_kategori['id_sub_kodefikasi_tiket'],
            'nama' => $data_sub_kategori['nama_sub_kodefikasi_tiket']
        ];
    }
    
    echo json_encode($subkategori_list);
}
?>
