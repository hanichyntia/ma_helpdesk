<?php
include('config.php'); // File untuk menghubungkan ke database

if(isset($_POST['subkategori'])) {
    $subkategori = mysqli_real_escape_string($conn, $_POST['subkategori']);
    
    $query = "SELECT id_sub_sub_kodefikasi_tiket, nama_sub_sub_kodefikasi_tiket FROM master_sub_sub_kodefikasi_tiket WHERE id_sub_kodefikasi_tiket = '$subkategori'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        echo '<option value="" selected disabled>Pilih Detail Subkategori</option>';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'.$row['id_sub_sub_kodefikasi_tiket'].'">'.$row['nama_sub_sub_kodefikasi_tiket'].'</option>';
        }
    } else {
        echo '<option value="">Detail Subkategori tidak tersedia</option>';
    }
} else {
    echo '<option value="">Data subkategori tidak diterima</option>';
}
?>
