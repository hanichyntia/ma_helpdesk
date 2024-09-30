<?php
include('config.php'); // File untuk menghubungkan ke database

if(isset($_POST['kategori'])) {
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    
    $query = "SELECT id_sub_kodefikasi_tiket, nama_sub_kodefikasi_tiket FROM master_sub_kodefikasi_tiket WHERE id_kodefikasi_tiket = '$kategori'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        echo '<option value="" selected disabled>Pilih Subkategori</option>';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'.$row['id_sub_kodefikasi_tiket'].'">'.$row['nama_sub_kodefikasi_tiket'].'</option>';
        }
    } else {
        echo '<option value="">Subkategori tidak tersedia</option>';
    }
} else {
    echo '<option value="">Data kategori tidak diterima</option>';
}
?>
