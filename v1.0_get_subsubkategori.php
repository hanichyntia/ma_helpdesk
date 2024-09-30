<?php
include 'config.php';

if (isset($_GET['subkategori'])) {
    $subkategori_id = $_GET['subkategori'];
    
    $qry_subsubkategori = mysqli_query($conn, "SELECT * FROM master_sub_sub_kodefikasi_tiket WHERE id_sub_kodefikasi_tiket='$subkategori_id'");
    
    $subsubkategori_list = [];
    
    while ($data_subsubkategori = mysqli_fetch_array($qry_subsubkategori)) {
        $subsubkategori_list[] = [
            'id' => $data_subsubkategori['id_sub_sub_kodefikasi_tiket'],
            'nama' => $data_subsubkategori['nama_sub_sub_kodefikasi_tiket']
        ];
    }
    
    echo json_encode($subsubkategori_list);
}
?>
