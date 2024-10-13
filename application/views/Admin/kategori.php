            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Kategori</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
                                            <li class="breadcrumb-item active">Kategori</li>
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
                                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahKategori">Tambah Kategori</button>
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th>Code Kategori</th>
                                                        <th>Nama Kategori</th>
                                                        <th>Aksi</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($kategori)): ?>
                                                            <?php foreach ($kategori as $kat): ?>
                                                                <tr>
                                                                    <td><?= $kat['codeKat']; ?></td>
                                                                    <td><?= $kat['namaKat']; ?></td>
                                                                    <td>
                                                                            
                                                                        <a href="<?= base_url('Admin/editKategori/' . $kat['codeKat']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                                        <a href="<?= base_url('Admin/hapusKategori/' . $kat['codeKat']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                                                            
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="3" class="text-center">Tidak ada data akun.</td>
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
                <div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                                <form action="<?= base_url('Admin/kategori'); ?>" method="post">
                                     
                                    <div class="mb-3">
                                        <label>Nama Kategori</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Nama Kategori" name="namaKat">
                                        </div>
                                        <?= form_error('namaKat','<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                      </div>
                      
                    </div>
                  </div>
                </div>

                

                