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
                                    <h4 class="mb-sm-0 font-size-18">Kelola Profil</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kelola Profil</a></li>
                                            <li class="breadcrumb-item active">Kelola Profil</li>
                                        </ol>
                                    </div>



                                </div>
                            </div>
                            <?= $this->session->flashdata('pesan'); ?>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img w-75" alt="...">
                                            </div>
                                            <div class="col-md-9">
                                                <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th>Nama</th>
                                                        <th>:</th>
                                                        <th><?= $user['nama']; ?></th>
                                                      </tr>
                                                      <tr>
                                                        <th>Email</th>
                                                        <th>:</th>
                                                        <th><?= $user['email']; ?></th>
                                                      </tr>
                                                      <tr>
                                                        <th>Username</th>
                                                        <th>:</th>
                                                        <th><?= $user['username']; ?></th>
                                                      </tr>
                                                      <tr>
                                                        <th>Tanggal Akun Dibuat</th>
                                                        <th>:</th>
                                                        <th><?= $user['created_at']; ?></th>
                                                      </tr>
                                                      
                                                    </thead>
                                                </table>
                                               <!--  <div class="form-group mb-3">
                                                  <label for="nama">Nama Lengkap</label>
                                                  <input type="text" class="form-control" id="nama">
                                                  
                                                </div>

                                                <div class="form-group mb-3">
                                                  <label for="email">E-Mail</label>
                                                  <input type="email" class="form-control" id="email">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                   
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <?= form_open_multipart('Admin/kelolaProfile'); ?>
                                                <div class="form-group mb-3">
                                                  <label for="nama">Nama Lengkap</label>
                                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                                  
                                                </div>

                                                <div class="form-group mb-3">
                                                  <label for="email">E-Mail</label>
                                                  <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <label for="username">Username</label>
                                                                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="nama">Image</label>
                                                                <input type="file" class="form-control" id="nama" name="image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->
                       


                        

                       

                       
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->