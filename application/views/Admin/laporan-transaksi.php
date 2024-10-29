            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Laporan Transaksi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan Transaksi</a></li>
                                            <li class="breadcrumb-item active">Laporan Transaksi</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="exampleLaporan" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th>Tanggal</th>
                                                        <th>Akun</th>
                                                        <th>Tipe Transaksi</th>
                                                        <th>Kategori</th>
                                                        <th>Nominal</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (!empty($laporanTransaksi)): ?>
                                                            <?php foreach ($laporanTransaksi as $lt): ?>
                                                                <tr>
                                                                    <td><?= date('d/m/Y', strtotime($lt['tglTransaksi'])); ?></td>
                                                                    <td><?= $lt['namaAkun']; ?> - <?= $lt['tipeAkun']; ?></td>
                                                                    <td>
                                                                        <?php if ($lt['tipeTransaksi'] == 'Pengeluaran'): ?>
                                                                            <span class="text-danger fw-bold"><?= $lt['tipeTransaksi']; ?></span>
                                                                        <?php else: ?>
                                                                            <span class="text-success fw-bold"><?= $lt['tipeTransaksi']; ?></span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?= $lt['namaKat']; ?></td>
                                                                    <td>Rp. <?= number_format($lt['nominal'], 0, ',', '.'); ?></td>
                                                                    
                                                                    
                                                                    
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


               