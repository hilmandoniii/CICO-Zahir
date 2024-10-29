            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Laporan Saldo</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan Saldo</a></li>
                                            <li class="breadcrumb-item active">Laporan Saldo</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                        <form method="get" action="">
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <label for="tanggal_awal">Tanggal Awal</label>
                                                    <input type="date" name="tanggal_awal" class="form-control" value="<?= isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : '' ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                                    <input type="date" name="tanggal_akhir" class="form-control" value="<?= isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : '' ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="tipe_akun">Tipe Akun</label>
                                                    <select name="tipe_akun" class="form-control">
                                                        <option value="">Pilih Tipe Akun</option>
                                                                <?php foreach ($tipeAkunList as $akun): ?>
                                                            <option value="<?= $akun['tipeAkun'] ?>" <?= (isset($_GET['tipe_akun']) && $_GET['tipe_akun'] == $akun['tipeAkun']) ? 'selected' : '' ?>>
                                                                        <?= $akun['tipeAkun'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 align-self-end">
                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card">
                                            <div class="card-body">
                                                
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="exampleLaporanSaldo" width="100%" cellspacing="0">
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

                                                        <?php if (!empty($laporanSaldo)): ?>
                                                            <?php foreach ($laporanSaldo as $lt): ?>
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
                                                                <td colspan="5" class="text-center">Belum ada transaksi.</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        
                                                    </tbody>
                                                    <?php if (!empty($laporanSaldo)): // Tampilkan tfoot hanya jika ada transaksi ?>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="4" class="text-end text-success fw-bold">Pemasukan</td>
                                                                <td class="text-success fw-bold" id="totalPemasukan">Rp. <?= number_format($totalPemasukan, 0, ',', '.'); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4" class="text-end text-danger fw-bold">Pengeluaran</td>
                                                                <td class="text-danger fw-bold" id="totalPengeluaran">Rp. <?= number_format($totalPengeluaran, 0, ',', '.'); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4" class="text-primary text-end fw-bold">Saldo</td>
                                                                <td class="text-primary fw-bold" id="saldo">Rp. <?= number_format($totalPemasukan - $totalPengeluaran, 0, ',', '.'); ?></td>
                                                            </tr>
                                                        </tfoot>
                                                    <?php endif; ?>

                                                   

                                                    
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


               