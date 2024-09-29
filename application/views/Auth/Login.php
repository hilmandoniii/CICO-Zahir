
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
                                            <img src="<?= base_url() ?>assets/tmp-admin/images/logo-sm.svg" alt="" height="28"> <span class="logo-txt">Minia</span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to Minia.</p>
                                        </div>
                                        <form class="mt-4 pt-2" action="index.html">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" placeholder="Enter username">
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Password</label>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="">
                                                            <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                                        <label class="form-check-label" for="remember-check">
                                                            Remember me
                                                        </label>
                                                    </div>  
                                                </div>
                                                
                                            </div>
                                            <div class="mb-3">
                                                <a href="<?= base_url('Admin'); ?>" class="btn btn-primary w-100 waves-effect waves-light">Login</a>
                                            </div>
                                        </form>

                                        <!-- <div class="mt-4 pt-2 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                                            </div>

                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="<?= base_url('auth/register'); ?>"
                                                        class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.html"
                                                    class="text-primary fw-semibold"> Signup now </a> </p>
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