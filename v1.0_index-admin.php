<!doctype php>
<php lang="en">

<head>
    <meta charset="utf-8" />
    <title>Beranda Helpdesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    
    <style>
    .small-chart {
        max-width: 700px;
        height: 300px;
        margin: auto;
    }
    </style>
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php include "header-admin.php";?>
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
                                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- Pie Chart 1 -->
                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Software</h4>
                                    <div id="chart1" class="text-left small-chart"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart 2 -->
                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Hardware</h4>
                                    <div id="chart2" class="text-left small-chart"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart 3 -->
                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Jaringan</h4>
                                    <div id="chart3" class="text-left small-chart"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Helpdesk.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Ma Chung
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard init -->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- Script for initializing charts -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Chart 1
            var options1 = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                series: [10, 20, 30, 40, 50, 60, 70, 80, 90, 10, 110, 120, 130, 140, 150, 160, 170, 180, 190],
                labels: ['1.1. Layanan Email',
                         '1.2. Layanan Kapasitas Penyimpanan Daring',
                         '1.3. Layanan Perkuliahan Daring',
                         '1.4. Layanan Aktivasi Lisensi Software',
                         '1.5. Layanan Forms Daring',
                         '1.6. Layanan sistem informasi akademik mahasiswa',
                         '1.7. Layanan sistem informasi akademik dosen',
                         '1.8. Layanan sistem informasi akademik orang tua',
                         '1.9. Layanan sistem informasi penerimaan mahasiswa baru',
                         '1.10. Layanan sistem informasi manajemen akademik',
                         '1.11. Layanan sistem informasi akademik fakultas',
                         '1.12. Layanan sistem informasi penjaminan mutu',
                         '1.13. Layanan sistem informasi poin keaktifan mahasiswa',
                         '1.14. Layanan sistem informasi keuangan mahasiswa',
                         '1.15. Layanan sistem informasi manajemen aset',
                         '1.16. Layanan sistem informasi eksekutif',
                         '1.17. Layanan sistem informasi kurikulum',
                         '1.18. Layanan sistem informasi kepegawaian',
                         '1.19. Layanan software non Windows'
                        ],
                legend: {
                    position: 'right',
                    horizontalAlign: 'left',
                    fontSize: '12px',
                    markers: {
                        width: 12,
                        height: 12,
                    },
                    itemMargin: {
                        horizontal: 5,
                        vertical: 5
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 320
                        },
                        legend: {
                            position: 'bottom'
                            
                        }
                    }
                }]
            };

            var chart1 = new ApexCharts(document.querySelector("#chart1"), options1);
            chart1.render();

            // Chart 2
            var options2 = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                series: [10],
                labels: ['2.1. Perangkat PC'],
                legend: {
                    position: 'right',
                    horizontalAlign: 'left',
                    fontSize: '12px',
                    markers: {
                        width: 12,
                        height: 12,
                    },
                    itemMargin: {
                        horizontal: 5,
                        vertical: 5
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 320
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
            chart2.render();

            // Chart 3
            var options3 = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                series: [10],
                labels: ['3.1. Layanan Jaringan'],
                legend: {
                    position: 'right',
                    horizontalAlign: 'left',
                    fontSize: '12px',
                    markers: {
                        width: 12,
                        height: 12,
                    },
                    itemMargin: {
                        horizontal: 5,
                        vertical: 5
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 320
                        },
                        legend: {
                            position: 'bottom'
                            
                        }
                    }
                }]
            };

            var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
            chart3.render();
        });
    </script>
</body>

</php>


// Kode index-admin.php