            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Transfer</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transfer</a></li>
                                            <li class="breadcrumb-item active">Transfer</li>
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
                                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#transaksi">Transfer</button>
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th>No</th>
                                                        <th>Sumber Akun</th>
                                                        <th>Akun Tujuan</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal Transfer</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($transfers)): ?>
                                                            <?php $no = 1;
                                                            foreach ($transfers as $transfer): ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $transfer['namaAkunSumber']; ?> - <?= $transfer['tipeAkunSumber']; ?></td>
                                                                    <td><?= $transfer['namaAkunTujuan']; ?> - <?= $transfer['tipeAkunTujuan']; ?></td>
                                                                    <td>Rp. <?= number_format($transfer['nominal'], 0, ',', '.'); ?></td>
                                                                    <td><?= date('d/m/Y - H:i:s', strtotime($transfer['tglTransfer'])); ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="6" class="text-center">Belum ada data transfer.</td>
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
                    <form action="<?= base_url('Admin/transfer'); ?>" method="post">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Transfer Antar Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label>Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tglTransfer">
                                            </div>
                                        </div>
                                                
                                        <div class="form-group mb-3">
                                            <label>Sumber Akun</label>
                                            <select class="form-select" name="sumberAkun">
                                                <option value="">Pilih Akun</option>
                                                    <?php foreach ($akuns as $akun): ?>
                                                        <option value="<?= $akun['kodeAkun']; ?>"><?= $akun['namaAkun']; ?> - <?= $akun['tipeAkun']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Tujuan Akun</label>
                                            <select class="form-select" name="tujuanAkun">
                                                <option value="">Pilih Akun</option>
                                                    <?php foreach ($akuns as $akun): ?>
                                                        <option value="<?= $akun['kodeAkun']; ?>"><?= $akun['namaAkun']; ?> - <?= $akun['tipeAkun']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
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











                