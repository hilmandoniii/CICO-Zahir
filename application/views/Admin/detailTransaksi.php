            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Detail Transaksi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Detail Transaksi</a></li>
                                            <li class="breadcrumb-item active">Detail Transaksi</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                        <div class="card">
                                            <div class="card-body">
                                                

                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    
                                                                        <div class="col-sd-12">
                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-12">
                                                                                    <h6><strong>Nomer Transaksi</strong></h6>
                                                                                    <small><?= $transaksi['nomorTransaksi']; ?></small>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-6">
                                                                                    <h6><strong>Nama Akun</strong></h6>
                                                                                    <small><?= $transaksi['namaAkun']; ?> | <?= $transaksi['tipeAkun']; ?></small>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <h6><strong>Tanggal Transaksi</strong></h6>
                                                                                    <small><?= $transaksi['tglTransaksi']; ?></small>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-6">
                                                                                    <h6><strong>Kode Kategori</strong></h6>
                                                                                    <small><?= $transaksi['codeKat']; ?></small>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <h6><strong>Kategori</strong></h6>
                                                                                    <small><?= $transaksi['namaKat']; ?></small>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <div class="col-sm-12">
                                                                                    <h6><strong>Tipe Transaksi</strong></h6>
                                                                                    <small><?= $transaksi['tipeTransaksi']; ?></small>
                                                                                </div>
                                                                            </div><hr>

                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <h6><strong>Nominal</strong></h6>
                                                                                    <small>Rp. <?= number_format($transaksi['nominal'], 0, ',', '.'); ?></small>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <h6><strong>Keterangan</strong></h6>
                                                                                    <small><?= $transaksi['keterangan']; ?></small>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
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



                

                