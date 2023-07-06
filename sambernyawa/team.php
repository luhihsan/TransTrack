<?php
include('koneksi.php');
if (isset($_POST['sort_order'])) {
  $sortOrder = $_POST['sort_order'];

  // Modify the SQL query to include the sorting order
  $sql = "SELECT driver.nama_driver, unit.nomer_lambung, unit.odometer, unit.id_unit FROM unit LEFT JOIN driver ON driver.id_driver=unit.id_unit ORDER BY unit.odometer $sortOrder";
} else {
  $sql = "SELECT driver.nama_driver, unit.nomer_lambung, unit.odometer, unit.id_unit FROM unit LEFT JOIN driver ON driver.id_driver=unit.id_unit";
}
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />

    <style>
    .table-container::-webkit-scrollbar {
  display: none;
}
    </style>
  </head>

  <body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->

    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
      <a href="coba_dashboard.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-blue"><i class="fa fa-bus me-3"></i>TransTrack</h2>
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="coba_dashboard.php" class="nav-item nav-link">Dashboard</a>
            <a href="team.php" class="nav-item nav-link">Unit Manager</a>
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="profil.png" width="40px" />
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="landingpage/landingpage.html">Logout</a>
            </div>
          </div>
          <a href="contact.html" class="nav-item nav-link"></a>
        </div>
       
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->

    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg)">
      <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
          <h1 class="display-3 text-white mb-3 animated slideInDown">Unit Manager</h1>
        </div>
      </div>
    </div>

    <!-- Page Header End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="wow fadeInUp" data-wow-delay="0.3s">
          <div class="table-container">
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th>Driver</th>
                  <th>Unit</th>
                  <th>Driving Distance</th>
                  <th>Action</th>
                </tr>
              </thead>
              <form action="" method="post" class="mb-4 align-middle">
                <div class="input-group">
                  <select class="form-select" name="sort_order">
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                  </select>
                  <button type="submit" name="sort_distance" class="btn btn-primary">Sort</button>
                </div>
              </form>


              <tbody>
              <?php
                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>" . $row['nama_driver'] . "</td>";
                          echo "<td>" . $row['nomer_lambung'] . "</td>";
                          echo "<td>" . $row['odometer'] . "</td>";
                          
                          echo "<td>
                                  <form action='team.php' method='post'>
                                      <input type='hidden' name='id_unit' value='" . $row['id_unit'] . "'>
                                      <button type='submit' name='more_detail' class='btn btn-success'>More Detail</button>
                                  </form>
                                </td>";

                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
      <div class="team-item wow fadeInUp" data-wow-delay="0.1s">
    <!-- Display a default message if "More Detail" button is not clicked -->
    <?php if (!isset($_POST['more_detail'])): ?>
      <div class="bg-light p-4">
        <h5 class="fw-bold mb-0">Driver Info</h5>
        <p>Pilih unit yang ingin anda lihat informasinya</p>
      </div>
    <?php endif; ?>

    <?php
    $selectedDriver = null;

    if (isset($_POST['more_detail'])) {
      $selectedUnit = $_POST['id_unit'];

      // Query untuk mengambil data driver berdasarkan id_unit yang dipilih
      $driverSql = "SELECT driver.nama_driver, driver.id_driver FROM driver LEFT JOIN unit ON driver.id_driver=unit.id_unit WHERE unit.id_unit = $selectedUnit";
      $driverResult = mysqli_query($conn, $driverSql);

      $unitSql = "SELECT unit.nomer_lambung FROM unit WHERE unit.id_unit = $selectedUnit";
      $unitResult = mysqli_query($conn, $unitSql);
      
      $foto = "SELECT unit.foto_unit FROM unit WHERE unit.id_unit = $selectedUnit";
      $fotoResult = mysqli_query($conn, $foto);

      if (mysqli_num_rows($driverResult) > 0) {
        $selectedDriver = mysqli_fetch_assoc($driverResult);
      } else {
        echo "Data tidak ditemukan";
      }

      
      if (mysqli_num_rows($unitResult) > 0) {
        $selectedUnitData = mysqli_fetch_assoc($unitResult);
        $nomerLambung = $selectedUnitData['nomer_lambung'];
      } else {
        echo "Data tidak ditemukan";
      }
      
      if (mysqli_num_rows($fotoResult) > 0) {
        $selectedFotoData = mysqli_fetch_assoc($fotoResult);
        $hasil_foto = $selectedFotoData['foto_unit'];
      } else {
        echo "Data tidak ditemukan";
      }
      
    }
    ?>

              <?php if (isset($selectedDriver)): ?>
      <!-- Display detailed information if "More Detail" button is clicked -->
      <div class="bg-light p-4">
        <h5 class="fw-bold mb-0">Driver Info</h5>
        <p></p>
        <p>Nama Driver: <b><?php echo $selectedDriver['nama_driver']; ?></b></p>
        <p>ID Driver: <b><?php echo $selectedDriver['id_driver']; ?></b></p>
      </div>
    <?php endif; ?>
            
          </div>
          <div class="position-relative overflow-hidden">
      <img class="img-fluid" src="./img/foto_unit/<?php echo $hasil_foto; ?>" />
    </div>
    <div class="button-container d-flex justify-content-between">

    <form action="history_log.php" method="post">
        <a>
          <input type="hidden" name="id_unit" value="<?php echo $selectedUnit; ?>">
          <button type="submit" name="kondisi" class="btn">
            <img src="History log.png" width="40px" />
            <p>History Log</p>
          </button>
        </a>
      </form>

      <form action="testimonial.php" method="post">
        <a>
          <input type="hidden" name="id_unit" value="<?php echo $selectedUnit; ?>">
          <button type="submit" name="kondisi" class="btn">
            <img src="Unit kondisi.png" width="40px" />
            <p>Unit Condition</p>
          </button>
        </a>
      </form>
      <form action="usability.php" method="post">
        <a>
          <input type="hidden" name="id_unit" value="<?php echo $selectedUnit; ?>">
          <button type="submit" name="usability" class="btn">
            <img src="usability data.png" width="40px" />
            <p>Usability Data</p>
          </button>
        </a>
      </form>
    </div>

          <div class="bg-light p-4">
          
                <p></p>
                <?php
                  if (isset($_POST['more_detail'])) {
                    $id_unit = $_POST['id_unit'];
                
                    $sql = "SELECT odometer FROM unit WHERE id_unit = $id_unit";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      $row = mysqli_fetch_assoc($result);
                      $driverDistance = $row['odometer'];
                      echo"<h5 class='fw-bold mb-0'>Indorent First Class</h5>";
                      echo "<p>Driven Distance: <b>$driverDistance</b></p>";
                      echo "<p>Unit ID: <b>$id_unit</b></p>";
                      echo "<p>Nomer Lambung Unit: <b>$nomerLambung</b></p>";
                     } else {
                      echo "Data tidak ditemukan";
                    }
                }
                ?>
          </div>
          <div class="bg-light p-4">
          
                <?php
                  if (isset($_POST['more_detail'])) {
                    $id_unit = $_POST['id_unit'];
                
                    // Query untuk mengambil data unit status dari tabel kondisi_unit
                    $statusSql = "SELECT keterangan_status FROM status_unit WHERE id_unit = $id_unit";
                    $statusResult = mysqli_query($conn, $statusSql);
                
                    if (mysqli_num_rows($statusResult) > 0) {
                        $row = mysqli_fetch_assoc($statusResult);
                        $unitStatus = $row['keterangan_status'];
                        echo"<h5 class='fw-bold mb-0'>Unit Info</h5>";
                        echo"<p>Unit Status: <b>$unitStatus</b></p>";
                    } else {
                        $unitStatus = "Data tidak ditemukan";
                    }

                  }
                ?>
                <?php
                    if (isset($_POST['more_detail'])) {
                      $id_unit = $_POST['id_unit'];
                  
                      // Query untuk mengambil data average fuel consumption berdasarkan id_unit yang dipilih
                      $sql = "SELECT avg_fuel FROM usability WHERE id_unit = $id_unit";
                      $result = mysqli_query($conn, $sql);
                  
                      if (mysqli_num_rows($result) > 0) {
                          $row = mysqli_fetch_assoc($result);
                          $averageFuel = $row['avg_fuel'];
                          echo "<p>Average Fuel Consumption: <b>$averageFuel</b></p>";
                      } else {
                          echo "Data tidak ditemukan";
                      }
                  }
                  ?>
                <?php
                  if (isset($_POST['more_detail'])) {
                    $id_unit = $_POST['id_unit'];

                    $profitSql = "SELECT avg_daily_profit FROM usability WHERE id_unit = $id_unit";
                        $profitResult = mysqli_query($conn, $profitSql);

                        if (mysqli_num_rows($profitResult) > 0) {
                            $row = mysqli_fetch_assoc($profitResult);
                            $averageProfit = $row['avg_daily_profit'];
                            echo"  <p>Daily Average Profit: <b>$averageProfit</b></p>";
                        } else {
                            $averageProfit = "Data tidak ditemukan";
                        }
                    }
                ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

     

    <!-- Team End -->

    <!-- Footer Start -->

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
