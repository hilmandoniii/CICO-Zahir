<footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <script>document.write(new Date().getFullYear())</script> CICO.
                            </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center p-3">

                    <h5 class="m-0 me-2">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>assets/tmp-admin/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/waves.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?= base_url() ?>assets/tmp-admin/js/pace.min.js"></script>

        <!-- apexcharts -->
        <script src="<?= base_url() ?>assets/tmp-admin/js/apexcharts.min.js"></script>

        <!-- Plugins js-->
        <script src="<?= base_url() ?>assets/tmp-admin/js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?= base_url() ?>assets/tmp-admin/js/jquery-jvectormap-world-mill-en.js"></script>
        <!-- dashboard init -->
        <script src="<?= base_url() ?>assets/tmp-admin/js/dashboard.init.js"></script>

        <script src="<?= base_url() ?>assets/tmp-admin/js/app.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url() ?>assets/table/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/table/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="<?= base_url() ?>assets/table/demo/datatables-demo.js"></script>

        <!-- export plugin -->
        <script src="<?= base_url('assets/') ?>table/extra/jquery.dataTables.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>table/extra/dataTables.bootstrap4.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>table/extra/dataTables.buttons.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>table/extra/buttons.print.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>table/extra/jszip.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>table/extra/pdfmake.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>table/extra/vfs_fonts.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>table/extra/buttons.html5.min.js" crossorigin="anonymous"></script>
        <!-- script -->

       <!-- <script type="text/javascript" class="init">
        $(document).ready(function() {
          $('#exampleLaporan').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                title: 'Data Penjualan',
                customize: function(win) {
                  $(win.document.body).find("")
                    .css('font-size', '10pt')
                    .append(
                      '<img src="http://localhost/andi/aplikasi-pengaduan-masyarakat//assets/gambar/bantu_java_code_1.png" />'
                    );

                  $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
              },
              {
                extend: 'pdf',
                orientation: 'portrait',
                pageSize: 'LEGAL',
                title: 'Data Penjualan'
              },
              {
                extend: 'excel',
                title: 'Data Penjualan'
              }
            ]
          });
        });
       </script> -->

       <script type="text/javascript" class="init">
            $(document).ready(function() {
                $('#exampleLaporan').DataTable({
                    dom: '<"row"<"col-sm-12 mb-3"B>>' +            // Baris pertama untuk tombol export di atas
                         '<"row"<"col-sm-6"l><"col-sm-6"f>>' + // Baris kedua untuk "show entries" di kiri dan search di kanan
                         '<"row"<"col-sm-12"tr>>' +            // Baris ketiga untuk tabel data
                         '<"row"<"col-sm-5"i><"col-sm-7"p>>',  // Baris keempat untuk informasi dan pagination di bawah
                    buttons: [
                        {
                            extend: 'print',
                            title: 'Laporan Transaksi',
                            className: 'btn btn-light',
                            customize: function(win) {
                                

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');

                            }
                           
                        },
                        {
                            extend: 'excel',
                            title: 'Laporan Transaksi',
                            className: 'btn btn-success'
                        }
                    ],
                    lengthMenu: [5, 10, 25, 50], // Menentukan opsi "show entries"
                    responsive: true, // Mengaktifkan responsivitas
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Next",
                            previous: "Previous"
                        }
                    }
                });
                var table = $('#exampleLaporanSaldo').DataTable({
                    dom: '<"row"<"col-sm-12 mb-3"B>>' +
                         '<"row"<"col-sm-6"l>>' + // Tampilkan show entries dan search
                         '<"row"<"col-sm-12"tr>>' + // Tampilkan tabel
                         '<"row"<"col-sm-5"i><"col-sm-7"p>>',  // Tampilkan informasi dan pagination
                    buttons: [
                        {
                            extend: 'print',
                            title: 'Laporan Transaksi',
                            className: 'btn btn-light',
                            customize: function(win) {
                                // Tambahkan <tfoot> ke hasil print
                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');

                                var footer = $('#exampleLaporanSaldo tfoot').clone(); // Clone tfoot
                                $(win.document.body).find('table').append(footer); // Tambahkan footer ke table print
                            }
                        },
                        {
                            extend: 'excel',
                            title: 'Laporan Transaksi',
                            className: 'btn btn-success',
                            customize: function( xlsx ) {
                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                var footer = $('#exampleLaporanSaldo tfoot').clone().html(); // Ambil HTML footer

                                // Tambahkan footer di bawah tabel
                                $(sheet).find('row:last').after(footer);
                            }
                        }
                        
                    ],
                    lengthMenu: [5, 10, 25, 50],
                    responsive: true,
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Next",
                            previous: "Previous"
                        }
                    }
                });




            });
        </script>

        <script>
        $(document).ready(function() {
            // Inisialisasi untuk tabel pertama
            $('#dataTable1').DataTable();
            
            // Inisialisasi untuk tabel kedua
            $('#dataTable2').DataTable();
        });   
       </script>

        <!-- <script>
            $('.alert').alert().delay(2000).slideUp('slow');
        </script> -->

        <script>
            // Menggunakan jQuery jika Anda sudah menyertakan jQuery di project
            $(document).ready(function() {
                // Mengatur waktu delay (misalnya 3 detik = 3000 milidetik)
                setTimeout(function() {
                    $('.alert-message').fadeOut('slow');
                }, 3000); // 3000 milidetik = 3 detik
            });
        </script>

    </body>

</html>