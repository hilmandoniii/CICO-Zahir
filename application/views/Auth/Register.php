
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/tmp-admin/images/favicon.ico">

        <!-- preloader css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/tmp-admin/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="<?= base_url() ?>assets/tmp-admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url() ?>assets/tmp-admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url() ?>assets/tmp-admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

   <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0 bg-primary">
                <div class="row justify-content-center align-items-center g-0">
                    <div class="col-xxl-6 col-lg-4 col-md-5 bg-white">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="<?= base_url() ?>assets/tmp-admin/images/logo-sm.svg" alt="" height="28"> <span class="logo-txt">CICO</span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Selamat Datang !</h5>
                                            <p class="text-muted mt-2">Daftar untuk melanjutkan !</p>
                                        </div>
                                        <form class="mt-4 pt-2" method="post" action="<?= base_url('Auth/Register'); ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap" name="nama">
                                                <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="username" placeholder="Masukan E-mail" name="email">
                                                <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username">
                                                <?= form_error('username','<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password1" placeholder="Masukan Password" name="password1">
                                                <?= form_error('password1','<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Ulangi Password</label>
                                                <input type="password" class="form-control" id="password2" placeholder="Ulangi Password" name="password2">
                                                <?= form_error('password2','<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                           
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">Daftar</button>
                                            </div>
                                        </form>

                                        

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Sudah punya akun ? <a href="<?= base_url('Auth'); ?>"
                                                    class="text-primary fw-semibold"> Login </a> </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                   
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>



        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>assets/tmp-admin/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/waves.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?= base_url() ?>assets/tmp-admin/js/pace.min.js"></script>
        <!-- password addon init -->
        <script src="<?= base_url() ?>assets/tmp-admin/js/pass-addon.init.js"></script>

    </body>

</html>