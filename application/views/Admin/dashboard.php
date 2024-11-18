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
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>



                                </div>
                            </div>
                            <?= $this->session->flashdata('pesan'); ?>
                        </div>
                        <!-- end page title -->

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form method="get" action="">
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label for="tipe_akun">Pilih Tipe Akun</label>
                                                <select name="tipe_akun" class="form-control" onchange="this.form.submit()">
                                                    <option value="">Pilih Tipe Akun</option>
                                                    <?php foreach ($tipeAkunList as $akun): ?>
                                                        <option value="<?= $akun['tipeAkun'] ?>" <?= ($this->input->get('tipe_akun') == $akun['tipeAkun']) ? 'selected' : '' ?>>
                                                            <?= $akun['tipeAkun'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Saldo</span>
                                                        <h4 class="mb-3">
                                                            <span>Rp <?= number_format($totalSaldo, 0, ',', '.') ?></span>
                                                        </h4>
                                                    </div>

                                                    
                                                </div>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-success-subtle text-success">+$20.9k</span>
                                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Pemasukan</span>
                                                        <h4 class="mb-3">
                                                            <span>Rp <?= number_format($totalPemasukan, 0, ',', '.') ?></span>
                                                        </h4>
                                                    </div>
                                                    
                                                </div>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-success-subtle text-success">+$20.9k</span>
                                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col-->
                
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-h-100">
                                            <!-- card body -->
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Pengeluaran</span>
                                                        <h4 class="mb-3">
                                                            <span>Rp <?= number_format($totalPengeluaran, 0, ',', '.') ?></span>
                                                        </h4>
                                                    </div>
                                                    
                                                </div>
                                                <div class="text-nowrap">
                                                    <span class="badge bg-danger-subtle text-danger">+$20.9k</span>
                                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div>

                            </div>
                        </div><!-- end row-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Transaksi</h4>
                                        <div class="flex-shrink-0">
                                            <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                                                        Semua 
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">
                                                        Pemasukan 
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">
                                                        Pengeluaran  
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- end nav tabs -->
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body px-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                                                <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                                    <table class="table align-middle table-nowrap table-borderless">
                                                        <tbody>
                                                            <?php foreach ($transaksi as $trans): ?>
                                                            <tr>
                                                               <td style="width: 50px;">
                                                                    <?php if ($trans['tipeTransaksi'] === 'Pemasukan'): ?>
                                                                        <div class="font-size-22 text-success">
                                                                            <i class="bx bx-up-arrow-circle d-block"></i>
                                                                        </div>
                                                                    <?php elseif ($trans['tipeTransaksi'] === 'Pengeluaran'): ?>
                                                                        <div class="font-size-22 text-danger">
                                                                            <i class="bx bx-down-arrow-circle d-block"></i>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <div>
                                                                        <h5 class="font-size-14 mb-1"><?= $trans['namaAkun']; ?></h5>
                                                                        <p class="text-muted mb-0 font-size-12"><?= $trans['tipeAkun']; ?></p>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div>
                                                                        <h5 class="font-size-14 mb-1"><?= ucfirst($trans['tipeTransaksi']); ?></h5>
                                                                        <p class="text-muted mb-0 font-size-12"><?= $trans['tglTransaksi']; ?></p>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="text-end">
                                                                        <h5 class="font-size-14 mb-0"><?= $trans['namaKat']; ?></h5>
                                                                        <p class="text-muted mb-0 font-size-12">Kategori</p>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="text-end">
                                                                        <h5 class="font-size-14 mb-0">Rp. <?= number_format($trans['nominal'], 0, ',', '.'); ?></h5>
                                                                        <p class="mb-0 font-size-12">Nominal</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                            <div class="tab-pane" id="transactions-buy-tab" role="tabpanel">
                                                <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                                    <table class="table align-middle table-nowrap table-borderless">
                                                        <tbody>
                                                            <?php foreach ($pemasukan as $trans): ?>
                                                                <tr>
                                                                    <td style="width: 50px;">
                                                                        <div class="font-size-22 text-success">
                                                                            <i class="bx bx-up-arrow-circle d-block"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-1"><?= $trans['namaAkun']; ?></h5>
                                                                            <p class="text-muted mb-0 font-size-12"><?= $trans['tipeAkun']; ?></p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-1"><?= ucfirst($trans['tipeTransaksi']); ?></h5>
                                                                            <p class="text-muted mb-0 font-size-12"><?= $trans['tglTransaksi']; ?></p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="text-end">
                                                                            <h5 class="font-size-14 mb-0"><?= $trans['namaKat']; ?></h5>
                                                                            <p class="text-muted mb-0 font-size-12">Kategori</p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="text-end">
                                                                            <h5 class="font-size-14 mb-0">Rp. <?= number_format($trans['nominal'], 0, ',', '.'); ?></h5>
                                                                            <p class="mb-0 font-size-12">Nominal</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                            <div class="tab-pane" id="transactions-sell-tab" role="tabpanel">
                                                <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                                    <table class="table align-middle table-nowrap table-borderless">
                                                        <tbody>
                                                            <?php foreach ($pengeluaran as $trans): ?>
                                                                <tr>
                                                                    <td style="width: 50px;">
                                                                        <div class="font-size-22 text-danger">
                                                                            <i class="bx bx-down-arrow-circle d-block"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-1"><?= $trans['namaAkun']; ?></h5>
                                                                            <p class="text-muted mb-0 font-size-12"><?= $trans['tipeAkun']; ?></p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div>
                                                                            <h5 class="font-size-14 mb-1"><?= ucfirst($trans['tipeTransaksi']); ?></h5>
                                                                            <p class="text-muted mb-0 font-size-12"><?= $trans['tglTransaksi']; ?></p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="text-end">
                                                                            <h5 class="font-size-14 mb-0"><?= $trans['namaKat']; ?></h5>
                                                                            <p class="text-muted mb-0 font-size-12">Kategori</p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="text-end">
                                                                            <h5 class="font-size-14 mb-0">Rp. <?= number_format($trans['nominal'], 0, ',', '.'); ?></h5>
                                                                            <p class="mb-0 font-size-12">Nominal</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Catatan Transaksi</h4>
                                        <div class="flex-shrink-0">
                                            <select class="form-select form-select-sm mb-0 my-n1">
                                                <option value="Today" selected="">Today</option>
                                                <option value="Yesterday">Yesterday</option>
                                                <option value="Week">Last Week</option>
                                                <option value="Month">Last Month</option>
                                            </select>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body px-0">
                                        <div class="px-3" data-simplebar style="max-height: 352px;">
                                            <ul class="list-unstyled activity-wid mb-0">

                                                <li class="activity-list activity-border">
                                                    <div class="activity-icon avatar-md">
                                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle">
                                                        <i class="bx bx-bitcoin font-size-24"></i>
                                                        </span>
                                                    </div>
                                                    <div class="timeline-list-item">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 overflow-hidden me-4">
                                                                <h5 class="font-size-14 mb-1">24/05/2021, 18:24:56</h5>
                                                                <p class="text-truncate text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                                            </div>
                                                            <div class="flex-shrink-0 text-end me-3">
                                                                <h6 class="mb-1">+0.5 BTC</h6>
                                                                <div class="font-size-13">$178.53</div>
                                                            </div>

                                                            <div class="flex-shrink-0 text-end">
                                                                <div class="dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>

                                                <li class="activity-list activity-border">
                                                    <div class="activity-icon avatar-md">
                                                        <span class="avatar-title  bg-primary-subtle text-primary rounded-circle">
                                                        <i class="mdi mdi-ethereum font-size-24"></i>
                                                        </span>
                                                    </div>
                                                    <div class="timeline-list-item">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 overflow-hidden me-4">
                                                                <h5 class="font-size-14 mb-1">24/05/2021, 18:24:56</h5>
                                                                <p class="text-truncate text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                                            </div>
                                                            <div class="flex-shrink-0 text-end me-3">
                                                                <h6 class="mb-1">-20.5 ETH</h6>
                                                                <div class="font-size-13">$3541.45</div>
                                                            </div>

                                                            <div class="flex-shrink-0 text-end">
                                                                <div class="dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>

                                                <li class="activity-list activity-border">
                                                    <div class="activity-icon avatar-md">
                                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle">
                                                        <i class="bx bx-bitcoin font-size-24"></i>
                                                        </span>
                                                    </div>
                                                    <div class="timeline-list-item">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 overflow-hidden me-4">
                                                                <h5 class="font-size-14 mb-1">24/05/2021, 18:24:56</h5>
                                                                <p class="text-truncate text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                                            </div>
                                                            <div class="flex-shrink-0 text-end me-3">
                                                                <h6 class="mb-1">+0.5 BTC</h6>
                                                                <div class="font-size-13">$5791.45</div>
                                                            </div>

                                                            <div class="flex-shrink-0 text-end">
                                                                <div class="dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>
            
                                                <li class="activity-list activity-border">
                                                    <div class="activity-icon avatar-md">
                                                        <span class="avatar-title  bg-primary-subtle text-primary rounded-circle">
                                                        <i class="mdi mdi-litecoin font-size-24"></i>
                                                        </span>
                                                    </div>
                                                    <div class="timeline-list-item">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 overflow-hidden me-4">
                                                                <h5 class="font-size-14 mb-1">24/05/2021, 18:24:56</h5>
                                                                <p class="text-truncate text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                                            </div>
                                                            <div class="flex-shrink-0 text-end me-3">
                                                                <h6 class="mb-1">-1.5 LTC</h6>
                                                                <div class="font-size-13">$5791.45</div>
                                                            </div>

                                                            <div class="flex-shrink-0 text-end">
                                                                <div class="dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>


                                                <li class="activity-list activity-border">
                                                    <div class="activity-icon avatar-md">
                                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle">
                                                        <i class="bx bx-bitcoin font-size-24"></i>
                                                        </span>
                                                    </div>
                                                    <div class="timeline-list-item">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 overflow-hidden me-4">
                                                                <h5 class="font-size-14 mb-1">24/05/2021, 18:24:56</h5>
                                                                <p class="text-truncate text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                                            </div>
                                                            <div class="flex-shrink-0 text-end me-3">
                                                                <h6 class="mb-1">+0.5 BTC</h6>
                                                                <div class="font-size-13">$5791.45</div>
                                                            </div>

                                                            <div class="flex-shrink-0 text-end">
                                                                <div class="dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>

                                                <li class="activity-list">
                                                    <div class="activity-icon avatar-md">
                                                        <span class="avatar-title  bg-primary-subtle text-primary rounded-circle">
                                                        <i class="mdi mdi-litecoin font-size-24"></i>
                                                        </span>
                                                    </div>
                                                    <div class="timeline-list-item">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 overflow-hidden me-4">
                                                                <h5 class="font-size-14 mb-1">24/05/2021, 18:24:56</h5>
                                                                <p class="text-truncate text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                                            </div>
                                                            <div class="flex-shrink-0 text-end me-3">
                                                                <h6 class="mb-1">+.55 LTC</h6>
                                                                <div class="font-size-13">$91.45</div>
                                                            </div>

                                                            <div class="flex-shrink-0 text-end">
                                                                <div class="dropdown">
                                                                    <a class="text-muted dropdown-toggle font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>
                                            </ul>
                                        </div>    
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>

                            
                        </div>

                        

                       

                       
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->