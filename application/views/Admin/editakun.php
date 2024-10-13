            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Edit Akun</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Akun</a></li>
                                            <li class="breadcrumb-item active">Edit Akun</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="<?= base_url('Admin/editAkun/' . $akun['kodeAkun']); ?>" method="post">
                                                    <div class="form-group mb-3">
                                                        <label>Tipe Akun</label>
                                                        <select class="form-select" name="tipeAkun">
                                                            <option value="#">Pilih Tipe Akun</option>
                                                            <option value="BCA" <?= $akun['tipeAkun'] == 'BCA' ? 'selected' : ''; ?>>BCA</option>
                                                            <option value="BNI" <?= $akun['tipeAkun'] == 'BNI' ? 'selected' : ''; ?>>BNI</option>
                                                            <option value="BTN" <?= $akun['tipeAkun'] == 'BTN' ? 'selected' : ''; ?>>BTN</option>
                                                            <option value="BRI" <?= $akun['tipeAkun'] == 'BRI' ? 'selected' : ''; ?>>BRI</option>
                                                            <option value="Mandiri" <?= $akun['tipeAkun'] == 'Mandiri' ? 'selected' : ''; ?>>Mandiri</option>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group mb-3">
                                                      <label for="nama">Nama Akun</label>
                                                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $akun['namaAkun']; ?>">
                                                      
                                                    </div>

                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Perubahan</button>
                                                    <a href="<?= base_url('Admin/akun'); ?>" class="btn btn-secondary waves-effect waves-light">Batal</a>

                                                </form>
                                            </div>
                                        </div>
                            </div>

                           

                            
                            <!-- end row-->
                        
                        </div>
                        <!-- end page title -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



                

                