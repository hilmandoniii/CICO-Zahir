            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Informasi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Informasi</a></li>
                                            <li class="breadcrumb-item active">Informasi</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahAkun">Tambah Akun</button>
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th>Code Akun</th>
                                                        <th>Nama</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td>Code Akun</td>
                                                        <td>Nama</td>
                                                      </tr>
                                                      
                                                    </tbody>
                                                  </table>
                                                </div>
                                            </div>
                                        </div>
                            </div>

                            <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahKategori">Tambah Kategori</button>
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th>No</th>
                                                        <th>Nama Kategori</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td>No</td>
                                                        <td>Nama Kategori</td>
                                                      </tr>
                                                      
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
                                    <div class="card-body">
                                        
                                                <div>
                                                    <div>
                                                        <label>Nama Akun</label>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text">Nama</label>
                                                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                                                        </div>
                                                    </div> 

                                                     <div class="form-group mb-3">
                                                        <label>Payment method :</label>
                                                        <select class="form-select">
                                                            <option>Direct Bank Payment</option>
                                                            <option>Credit / Debit Card</option>
                                                            <option>Paypal</option>
                                                            <option>Payoneer</option>
                                                            <option>Stripe</option>
                                                        </select>
                                                    </div> 
                                                </div>
                                           
                                    </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                                    <div class="card-body">
                                        
                                                <div>
                                                    <div>
                                                        <label>Kategori</label>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text">Kategori</label>
                                                            <input type="text" class="form-control" placeholder="Tambah Kategori">
                                                        </div>
                                                    </div> 

                                                    <!--  <div class="form-group mb-3">
                                                        <label>Payment method :</label>
                                                        <select class="form-select">
                                                            <option>Direct Bank Payment</option>
                                                            <option>Credit / Debit Card</option>
                                                            <option>Paypal</option>
                                                            <option>Payoneer</option>
                                                            <option>Stripe</option>
                                                        </select>
                                                    </div>  -->
                                                </div>
                                         
                                    </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>

                