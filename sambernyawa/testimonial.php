<?php
include('koneksi.php');
if (isset($_POST['kondisi'])) {
  $selectedUnit = $_POST['id_unit'];

// Query untuk mengambil data dari tabel unit
$query_unit = "SELECT * FROM unit WHERE id_unit = '$selectedUnit'";
$result_unit = mysqli_query($conn, $query_unit);
$row_unit = mysqli_fetch_assoc($result_unit);

// Query untuk mengambil data dari tabel data_chassis
$query_chassis = "SELECT * FROM data_chassis WHERE id_unit = '$selectedUnit'";
$result_chassis = mysqli_query($conn, $query_chassis);
$row_chassis = mysqli_fetch_assoc($result_chassis);
$result_chassis = mysqli_query($conn, $query_chassis);
if (!$result_chassis) {
    die('Error: ' . mysqli_error($conn));
}
$query_status = "SELECT * FROM status_unit WHERE id_unit = '$selectedUnit'";
$result_status = mysqli_query($conn, $query_status);
$row_status = mysqli_fetch_assoc($result_status);

$query_kondisi = "SELECT * FROM kondisi_unit WHERE id_unit = '$selectedUnit'";
$result_kondisi = mysqli_query($conn, $query_kondisi);
$row_kondisi = mysqli_fetch_assoc($result_kondisi);

}
// Close koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      .background {
        background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(113, 121, 9, 1) 63%, rgba(0, 212, 255, 1) 100%);
        /* tambahkan properti lain yang diperlukan */
      }
    </style>
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
  </head>

  <body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
          <h2 class="m-0 text-blue"><i class="fa fa-car me-3"></i>TransTrack</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.html" class="nav-item nav-link"></a>
            <a href="about.html" class="nav-item nav-link active"></a>
            <a href="service.html" class="nav-item nav-link"></a>
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="profil.png" width="40px" />
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="index.html">Logout</a>
              </div>
            </div>
            <a href="contact.html" class="nav-item nav-link"></a>
          </div>
          <a href="about.html" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">Menu<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
      </nav>
    <!-- Navbar End -->

    <!-- Contact Start -->
    <div class="background"></div>
    <div class="container-xxl py-5 ">
      <div class="container ">
          <div class="col-12">
            <div class="row gy-4">
              <div class="col-md-4">
                <div class="bg-light d-flex flex-column justify-content-center p-4">
                  <h5 class="text-uppercase text-center"> <?php echo isset($row_unit['nomer_lambung']) ? $row_unit['nomer_lambung'] : 'N/A'; ?></h5>
                  <hr>
                  <div class="">
                    <div class="card-body">
                      <h5 class="card-title">Chassis Type   :  <?php echo isset($row_unit['chassis']) ? $row_unit['chassis'] : 'N/A'; ?></h5>
                      <p class="card-text"></p>
                      <h5 class="card-title">Engine Power  : <?php echo isset($row_chassis['eng_power']) ? $row_chassis['eng_power'] : 'N/A'; ?></h5>
                      <p class="card-text"></p>
                      <h5 class="card-title">Engine Torque : <?php echo isset($row_chassis['eng_torque']) ? $row_chassis['eng_torque'] : 'N/A'; ?></h5>
                      <p class="card-text"></p>
                      <h5 class="card-title">Gearbox       : <?php echo isset($row_chassis['gearbox']) ? $row_chassis['gearbox'] : 'N/A'; ?></h5>
                      <p class="card-text"></p>
                      <h5 class="card-title">Fuel Tank     : <?php echo isset($row_chassis['oil_tank']) ? $row_chassis['oil_tank'] : 'N/A'; ?></h5>
                    </div>
                    <!-- <ul class="list-group list-group-flush">
                      <li class="list-group-item">Engine : Good Condition</li>
                      <li class="list-group-item">A second item</li>
                      <li class="list-group-item">A third item</li>
                      <li class="list-group-item">A third item</li>
                      <li class="list-group-item">A third item</li>
                    </ul> -->
                  </div>
                  </div>
                </div>
                <div class="col">
                  <img class="justify-content-center" src="bus3.png"  width="107%"/>
                </div>
                <div class="card bg-light">
                  <div class="card-body bg-light">
                    <h5 class="card-title">Damage Report</h5>
                    <p class="card-text">A damage report is provided by a repairer to help us understand the background to unit condition it self</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <h6>Engine :</h6>
                      <button type="button" class="btn btn-success btn-block"><?php echo isset($row_kondisi['prsn_mesin']) ? $row_kondisi['prsn_mesin'] : 'N/A'; ?></button>
                    </li>
                    <li class="list-group-item">
                      <h6>Gearbox :</h6>
                      <button type="button" class="btn btn-danger btn-block"><?php echo isset($row_kondisi['prsn_transmisi']) ? $row_kondisi['prsn_transmisi'] : 'N/A'; ?></button>
                    </li>
                    <li class="list-group-item">
                      <h6>Break and Wheel :</h6>
                      <button type="button" class="btn btn-success btn-block"><?php echo isset($row_kondisi['prsn_rem_dan_ban']) ? $row_kondisi['prsn_rem_dan_ban'] : 'N/A'; ?></button>
                    </li>
                    <li class="list-group-item">
                      <h6>Electricity :</h6>
                      <button type="button" class="btn btn-warning btn-block"><?php echo isset($row_kondisi['prsn_kelistrikan']) ? $row_kondisi['prsn_kelistrikan'] : 'N/A'; ?></button>
                    </li>
                    <li class="list-group-item"></li>
                  </ul>
                  <div class="card-body">
                    <button type="button" class="btn btn-dark btn-block">Unit Status :</button>
                    <button type="button" class="btn btn-warning btn-block"><?php echo isset($row_status['keterangan_status']) ? $row_status['keterangan_status'] : 'N/A'; ?></button>
                  </div>
                  <div class="card-body">
                    <button type="button" class="btn btn-dark btn-block">Unit Total Damage:</button>
                    <button type="button" class="btn btn-warning btn-block"><?php echo isset($row_kondisi['prsn_total']) ? $row_kondisi['prsn_total'] : 'N/A'; ?></button>
                  </div>
                  <div class="card-body">
                    <button type="button" class="btn btn-dark btn-block">Total Bill To Pay:</button>
                    <button type="button" class="btn btn-warning btn-block"><?php echo isset($row_kondisi['total_pay']) ? $row_kondisi['total_pay'] : 'N/A'; ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
          </div>
          <div class="row g-4" >
            <div class="col-12">
              <div class="row gy-4">
                <div class="" style="width: 26rem">
                </div>
            </div>
          </div>
       
      </div>
    </div>
    <!-- Contact End -->
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



