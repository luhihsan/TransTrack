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

$query_history = "SELECT * FROM history_log WHERE id_unit = '$selectedUnit'";
$result_history = mysqli_query($conn, $query_history);
$row_history = mysqli_fetch_assoc($result_history);

$foto = "SELECT unit.foto_unit FROM unit WHERE unit.id_unit = $selectedUnit";
$fotoResult = mysqli_query($conn, $foto);
$selectedFotoData = mysqli_fetch_assoc($fotoResult);


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

    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(fotopanjang.jpg)">
      <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
          <h1 class="display-3 text-white mb-3 animated slideInDown">Unit Maintenance History Log</h1>
        </div>
      </div>
    </div>

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
                  <img class="justify-content-center" src="./img/foto_unit/<?php echo $selectedFotoData['foto_unit']; ?>"/>
                </div>
                <div class="card bg-light">
                  <div class="card-body bg-light">
                    <h5 class="card-title">Unit Maintenance Log Book</h5>
                    <p class="card-text">Contains information on unit maintenance carried out by our mechanics teams. The information in the column below is information from the most recent unit maintenance</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <h6>Date : <?php echo isset($row_history['tgl']) ? $row_history['tgl'] : 'N/A'; ?></h6>
                    </li>

                    <li class="list-group-item">
                      <h6>Odometer : <?php echo isset($row_history['odometer']) ? $row_history['odometer'] : 'N/A'; ?></h6>
                    </li>

                    <li class="list-group-item">
                      <h6>Description : <?php echo isset($row_history['deskripsi']) ? $row_history['deskripsi'] : 'N/A'; ?></h6>
                    </li>

                    <li class="list-group-item">
                      <h6>Performed by : <?php echo isset($row_history['pic']) ? $row_history['pic'] : 'N/A'; ?> </h6>
                    </li>

                    <li class="list-group-item">
                    <h6>Notes : <?php echo isset($row_history['note']) ? $row_history['note'] : 'N/A'; ?> </h6>
                    </li>
                  </ul>

                  <div class="card-body">
                    <button type="button" class="btn btn-dark btn-block">Total Cost:</button>
                    <button type="button" class="btn btn-warning btn-block"> <?php echo isset($row_history['cost']) ? $row_history['cost'] : 'N/A'; ?></button>
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



