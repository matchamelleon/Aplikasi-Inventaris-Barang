 <footer class="main-footer">
     <div class="footer-center">
     © 2023 All Rights are Reserved Developed by Kelompok 1 | HOONIVERSE
     </div>
     <div class="footer-center">

     </div>
 </footer>
 </div>
 </div>
 <!-- General JS Scripts -->
 <script src="<?= base_url() ?>./assets/modules/jquery.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/popper.js"></script>
 <script src="<?= base_url() ?>./assets/modules/tooltip.js"></script>
 <script src="<?= base_url() ?>./assets/modules/bootstrap/js/bootstrap.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/moment.min.js"></script>
 <script src="<?= base_url() ?>./assets/js/stisla.js"></script>

 <!-- JS Libraies -->
 <script src="<?= base_url() ?>./assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/chart.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
 <script src="<?= base_url() ?>./assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
 <script src="<?= base_url() ?>./assets/modules/summernote/summernote-bs4.js"></script>
 <script src="<?= base_url() ?>./assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

 <!-- Page Specific JS File -->
 <script src="<?= base_url() ?>./assets/js/page/index-0.js"></script>

 <!-- Template JS File -->
 <script src="<?= base_url() ?>./assets/js/scripts.js"></script>
 <script src="<?= base_url() ?>./assets/js/custom.js"></script>

 <script src="<?= base_url(); ?>./assets/DataTables/datatables.min.js"></script>

 <!-- fontawesome -->
 <script src="<?= base_url(); ?>./assets/fontawesom/js/fontawesome.min.js"></script>


 <!-- atur sesi muncul flashdata -->
 <script>
     setTimeout(function() {
         $('#flashdata').hide();
     }, 3000);
 </script>
 <script>
     function clearme() {
         <?php
            if (isset($_SESSION['message'])) :
                unset($_SESSION['message']);
            elseif (isset($_SESSION['message'])) :
                unset($_SESSION['message']);
            endif;
            ?>
     }
 </script>

 <!-- script datatbles -->
 <script>
     $(document).ready(function() {
         $('#satuan').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#user').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#kategori-produk').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#data-produk').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#kategori-produk').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#produk-keluar').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#data-pemasok').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#request-produk').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#cek-stok').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#request-masuk').DataTable();
     });
 </script>




 </body>

 </html>