<?php include 'header.php'; ?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">FAQ</h4>

                    </div>
                </div>
            </div>
            
            <?php 
            include "config.php";
            $qry_kategori = mysqli_query($conn, "select * from master_kodefikasi_tiket");
            while ($dt_kategori=mysqli_fetch_array($qry_kategori)) {
              ?>
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?=$dt_kategori['name_kodefikasi_tiket']?></h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted"><?=$dt_kategori['deskripsi']?></p>
                            <div class="mt-4">
                                <a href="sub-kodefikasi.php?id_kodefikasi_tiket=<?=$dt_kategori['id_kodefikasi_tiket']?>"
                                    class="btn btn-primary waves-effect waves-light btn-sm">Lihat Lebih Lanjut<i
                                        class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?php include 'footer.php'; ?>