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

    </head>

    <body data-sidebar="dark">

        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <div class="navbar-brand-box">
                        <a href="faq.php" class="logo logo-ma-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-ma-kecil.png" alt="Logo Small Light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-ma-light.png" alt="Logo Large Light" height="100">
                            </span>
                        </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">Henry</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <a class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu"></li>

                            <li>
                                <a href="faq.php" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="t-dashboards">FAQ</span>
                                </a>
                            </li>

                            <li>  
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-detail"></i>
                                    <span key="t-tiket">Tiket</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tiket.php" key="t-tiket">Kirim Tiket</a></li>
                                    <li><a href="lihat-tiket.php" key="t-lihat">Lihat Tiket</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">FAQ</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <ul class="nav nav-tabs nav-tabs-custom justify-content-center pt-2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#all-post" role="tab">
                                               All Post
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#mahasiswa" role="tab">
                                               Mahasiswa
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#dosen" role="tab">
                                               Dosen  
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="all-post" role="tabpanel">
                                            <div>
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-8">
                                                        <div>
                                                            <hr class="mb-4">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="card p-1 border shadow-none">
                                                                        <div class="p-3">
                                                                            <h5><a href="landing-mahasiswa.php" class="text-dark">Beautiful Day with Friends</a></h5>
                                                                            <p class="text-muted mb-0">10 Apr, 2020</p>
                                                                        </div>
                                                                        
                                                                        <div class="position-relative">
                                                                            <img src="assets/images/small/img-2.jpg" alt="" class="img-thumbnail">
                                                                        </div>
        
                                                                        <div class="p-3">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Project
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
            
                                                                            <div>
                                                                                <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="card p-1 border shadow-none">
                                                                        <div class="p-3">
                                                                            <h5><a href="blog-details.html" class="text-dark">Drawing a sketch</a></h5>
                                                                            <p class="text-muted mb-0">24 Mar, 2020</p>
                                                                        </div>
                                                                        
                                                                        <div class="position-relative">
                                                                            <img src="assets/images/small/img-6.jpg" alt="" class="img-thumbnail">
                                                                            
                                                                            <div class="blog-play-icon">
                                                                                <a href="javascript: void(0);" class="avatar-sm d-block mx-auto">
                                                                                    <span class="avatar-title rounded-circle font-size-18"><i class="mdi mdi-play"></i></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="p-3">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
            
                                                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus quos</p>
            
                                                                            <div>
                                                                                <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane active" id="mahasiswa" role="tabpanel">
                                            <div>
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-8">
                                                        <div>
                                                            <hr class="mb-4">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="card p-1 border shadow-none">
                                                                        <div class="p-3">
                                                                            <h5><a href="landing-mahasiswa.php.html" class="text-dark">Beautiful Day with Friends</a></h5>
                                                                            <p class="text-muted mb-0">10 Apr, 2020</p>
                                                                        </div>
                                                                        
                                                                        <div class="position-relative">
                                                                            <img src="assets/images/small/img-2.jpg" alt="" class="img-thumbnail">
                                                                        </div>
        
                                                                        <div class="p-3">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Project
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
            
                                                                            <div>
                                                                                <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane active" id="dosen" role="tabpanel">
                                            <div>
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-8">
                                                        <div>
                                                            <hr class="mb-4">

                                                            <div class="row">

                                                                <div class="col-sm-6">
                                                                    <div class="card p-1 border shadow-none">
                                                                        <div class="p-3">
                                                                            <h5><a href="landing-dosen.php" class="text-dark">Drawing a sketch</a></h5>
                                                                            <p class="text-muted mb-0">24 Mar, 2020</p>
                                                                        </div>
                                                                        
                                                                        <div class="position-relative">
                                                                            <img src="assets/images/small/img-6.jpg" alt="" class="img-thumbnail">
                                                                            
                                                                            <div class="blog-play-icon">
                                                                                <a href="javascript: void(0);" class="avatar-sm d-block mx-auto">
                                                                                    <span class="avatar-title rounded-circle font-size-18"><i class="mdi mdi-play"></i></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="p-3">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item me-3">
                                                                                    <a href="javascript: void(0);" class="text-muted">
                                                                                        <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
            
                                                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus quos</p>
            
                                                                            <div>
                                                                                <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Duplicate content for mahasiswa and dosen tabs -->
                                        <div class="tab-pane" id="mahasiswa" role="tabpanel">
                                            <!-- Same content as "all-post" -->
                                            <!-- You can modify this section for specific "mahasiswa" content if needed -->
                                        </div>

                                        <div class="tab-pane" id="dosen" role="tabpanel">
                                            <!-- Same content as "all-post" -->
                                            <!-- You can modify this section for specific "dosen" content if needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="rightbar-overlay"></div>

        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
