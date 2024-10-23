            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Informasi Akun</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Informasi Akun</a></li>
                                            <li class="breadcrumb-item active">Informasi Akun</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                            <?= $this->session->flashdata('pesan'); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahAkun">Tambah Akun</button>
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th>Code Akun</th>
                                                        <th>Nama</th>
                                                        <th>Tipe</th>
                                                        <th>Aksi</th>
                                                        
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($akuns)): ?>
                                                            <?php foreach ($akuns as $akun): ?>
                                                                <tr>
                                                                    <td><?= $akun['kodeAkun']; ?></td>
                                                                    <td><?= $akun['namaAkun']; ?></td>
                                                                    <td><?= $akun['tipeAkun']; ?></td>
                                                                    <td>
                                                                        
                                                                            <a href="<?= base_url('Admin/editAkun/' . $akun['kodeAkun']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                                            <a href="<?= base_url('Admin/hapusAkun/' . $akun['kodeAkun']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                                                        
                                                                      </td>
                                                                    
                                                                    
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="4" class="text-center">Tidak ada data akun.</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                      
                                                    </tbody>
                                                  </table>
                                                </div>
                                            </div>
                                        </div>
                            </div>

                           

                            
                            <!-- end row-->
                        
                        </div>
                        <!-- end page title -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <!-- Modal -->
                <div class="modal fade" id="tambahAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                                <form action="<?= base_url('Admin/akun'); ?>" method="post">
                                    <div class="form-group mb-3">
                                        <label>Tipe Akun</label>
                                        <select class="form-select" name="tipeAkun">
                                            <option value="#">Pilih Tipe Akun</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BNI">BNI</option>
                                            <option value="BTN">BTN</option>
                                            <option value="BRI">BRI</option>
                                            <option value="Mandiri">Mandiri</option>
                                        </select>
                                    </div> 
                                    <div class="mb-3">
                                        <label>Nama Akun</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Nama Akun" name="nama">
                                        </div>
                                        <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                      </div>
                      
                    </div>
                  </div>
                </div>

                

                