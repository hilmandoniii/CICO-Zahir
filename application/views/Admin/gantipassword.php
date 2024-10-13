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
                                    <h4 class="mb-sm-0 font-size-18">Ganti Password</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ganti Password</a></li>
                                            <li class="breadcrumb-item active">Ganti Password</li>
                                        </ol>
                                    </div>



                                </div>
                            </div>
                            
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?= $this->session->flashdata('pesan'); ?>
                                        <?= form_open('Admin/gantiPassword') ?>
                                        <div class="form-group mb-3">
                                          <label for="passwordold">Password Sekarang</label>
                                          <input type="password" class="form-control" id="passwordold" placeholder="Masukan password sekarang" name="current_password">
                                          <?= form_error('current_password','<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group mb-3">
                                          <label for="password1">Password Baru</label>
                                          <input type="password" class="form-control" id="password1" placeholder="Masukan password baru" name="new_password">
                                          <?= form_error('new_password','<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group mb-3">
                                          <label for="password2">Konfirmasi Password Baru</label>
                                          <input type="password" class="form-control" id="password2" placeholder="Konfirmasi password baru" name="confirm_password">
                                          <?= form_error('confirm_password','<small class="text-danger pl-3">', '</small>'); ?>
                                          <br><small class="form-text text-muted">Jangan pernah beritahukan password kepada siapapun.</small>
                                          
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Perubahan</button>
                                        <?= form_close(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->
                       


                        

                       

                       
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->