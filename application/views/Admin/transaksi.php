            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Transaksi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                                            <li class="breadcrumb-item active">Transaksi</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#transaksi">Tambah Data</button>
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th>Nomer Transaksi</th>
                                                        <th>Akun</th>
                                                        <th>Tipe Transaksi</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal Transaksi</th>
                                                        <th>Aksi</th>
                                                        
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($transaksi)): ?>
                                                            <?php foreach ($transaksi as $tr): ?>
                                                                <tr>
                                                                    <td>
                                                                       <a href="<?= base_url('Admin/detailTransaksi/' . $tr['nomorTransaksi']); ?>">
                                                                            <?= $tr['nomorTransaksi']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td><?= $tr['namaAkun']; ?> - <?= $tr['tipeAkun']; ?></td>
                                                                    <td>
                                                                        <?php if ($tr['tipeTransaksi'] == 'Pengeluaran'): ?>
                                                                            <span class="text-danger fw-bold"><?= $tr['tipeTransaksi']; ?></span>
                                                                        <?php else: ?>
                                                                            <span class="text-success fw-bold"><?= $tr['tipeTransaksi']; ?></span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td>Rp. <?= number_format($tr['nominal'], 0, ',', '.'); ?></td>
                                                                    <td><?= date('d/m/Y - H:i:s', strtotime($tr['tglTransaksi'])); ?></td>
                                                                    <td>
                                                                        <!-- <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a> -->
                                                                        <a href="<?= base_url('Admin/hapusTransaksi/' . $tr['nomorTransaksi']); ?>" 
                                                                           class="btn btn-danger btn-sm" 
                                                                           onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                                                           <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="6" class="text-center">Belum ada transaksi.</td>
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
                <div class="modal fade" id="transaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="<?= base_url('Admin/transaksi'); ?>" method="post">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                                    <div class="card-body">
                                                
                                        <div class="form-group mb-3">
                                            <label>Akun</label>
                                            <select class="form-select" name="kodeAkun">
                                                <option value="">Pilih Akun</option>
                                                    <?php foreach ($akuns as $akun): ?>
                                                        <option value="<?= $akun['kodeAkun']; ?>"><?= $akun['namaAkun']; ?> - <?= $akun['tipeAkun']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Kategori</label>
                                            <select class="form-select" name="codeKat">
                                                <option value="">Pilih Kategori</option>
                                                    <?php foreach ($kategori as $kat): ?>
                                                        <option value="<?= $kat['codeKat']; ?>"><?= $kat['namaKat']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>

                                                    

                                        <div class="row">
                                            <label>Tipe</label>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <!-- card body -->
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tipeTransaksi" value="Pemasukan">
                                                                <label class="form-check-label">
                                                                    Pemasukan
                                                                </label>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div>  
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <!-- card body -->
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tipeTransaksi" value="Pengeluaran">
                                                                <label class="form-check-label">
                                                                    Pengeluaran
                                                                </label>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tglTransaksi">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Nominal</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Masukan Nominal" name="nominal">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Keterangan</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Tambah Keterangan" name="keterangan">
                                            </div>
                                        </div>

                                    </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>











                