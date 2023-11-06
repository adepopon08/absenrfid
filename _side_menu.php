  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link teks">
          <img src="image/logo.jpg" alt="SMKN 1 Kawali" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light ">Absensi Siswa</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info">
                  <span class="brand-text text-light text-center">
                      <h2 id="timestamp"></h2>
                  </span>

              </div>

          </div>

          <!-- SidebarSearch Form -->


          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="index.php" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard

                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="siswa.php" class="nav-link">
                          <i class="nav-icon fas fa-users "></i>
                          <p>
                              Data Siswa

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="absensi.php" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Rekapitulasi Absensi
                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="scan.php" class="nav-link">
                          <i class="nav-icon fas fa-qrcode"></i>
                          <p>
                              Scan Kartu
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="user.php" class="nav-link">
                          <i class="nav-icon fa fa-id-card-o"></i>
                          <p>
                              Absensi
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <script>
      // Function ini dijalankan ketika Halaman ini dibuka pada browser
      $(function() {
          setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
      });

      //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
      function timestamp() {
          $.ajax({
              url: 'ajax_timestamp.php',
              success: function(data) {
                  $('#timestamp').html(data);
              },
          });
      }
  </script>