<?php
include('koneksi.php');
if (isset($_POST['usability'])) {
  $selectedUnit = $_POST['id_unit'];

  $query_unit = "SELECT * FROM unit WHERE id_unit = '$selectedUnit'";
  $result_unit = mysqli_query($conn, $query_unit);
  $row_unit = mysqli_fetch_assoc($result_unit);  

  $query_usability = "SELECT * FROM usability WHERE id_unit = '$selectedUnit'";
  $result_usability = mysqli_query($conn, $query_usability);
  $row_usability = mysqli_fetch_assoc($result_usability);

  if (!$result_usability) {
    die('Error: ' . mysqli_error($conn));
  }

  $foto = "SELECT unit.foto_unit FROM unit WHERE unit.id_unit = $selectedUnit";
  $fotoResult = mysqli_query($conn, $foto);
  $selectedFotoData = mysqli_fetch_assoc($fotoResult);
}
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
      .chart-container {
  width: 100%;
  height: 300px; /* Set an initial height for the chart */
}

@media (max-width: 767px) {
  .chart-container {
    height: 200px; /* Adjust the height for smaller screens */
  }
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(fotopanjang2.jpg)">
      <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
          <h1 class="display-3 text-white mb-3 animated slideInDown">Unit Usability Data</h1>
        </div>
      </div>
    </div>

    <!-- Contact Start -->
    
    <div class="container-xxl py-5">
  <div class="container">
    <div class="row ">
      <div class="col-md-4">
        <!-- Column 1 -->
        <div class="bg-light d-flex flex-column justify-content-center p-4">
          <h5 class="text-uppercase text-center"><?php echo isset($row_unit['nomer_lambung']) ? $row_unit['nomer_lambung'] : 'N/A'; ?></h5>
          <hr>
          <div class="card-body">
            <img class="justify-content-center" src="./img/foto_unit/<?php echo $selectedFotoData['foto_unit']; ?>" width="104%">
          </div>

          

        </div>
        <p></p>
        <div>
           <h3 class="text-uppercase ">Daily Profit and Spending</h3>
        <p>Average Daily Profit: <h5><?php echo isset($row_usability['avg_daily_profit']) ? $row_usability['avg_daily_profit'] : 'N/A'; ?></h5></p>
        <p>Average Daily Spending: <h5><?php echo isset($row_usability['avg_daily_spend']) ? $row_usability['avg_daily_spend'] : 'N/A'; ?></h5> </p>

        <h3 class="text-uppercase ">Unit Usability Data</h3>
        <p>Monthly Average Profit: <h5><?php echo isset($row_usability['avg_monthly_profit']) ? $row_usability['avg_monthly_profit'] : 'N/A'; ?></h5></p>
        <p>Monthly Average Spending: <h5><?php echo isset($row_usability['avg_monthly_spend']) ? $row_usability['avg_monthly_spend'] : 'N/A'; ?></h5></p>
        <p>Monthly Average Jobs: <h5><?php echo isset($row_usability['avg_job']) ? $row_usability['avg_job'] : 'N/A'; ?></h5></p>
        <p>Monthly Average Fuel Consumption: <h5><?php echo isset($row_usability['avg_fuel']) ? $row_usability['avg_fuel'] : 'N/A'; ?></h5></p>

        </div>
      </div>

      <div class="col-md-8">
        
       
          <div class="col-md-6">
            <div class="bg d-flex flex-column justify-content-center p-4">
              <div class="chart-container">
                <?php include 'chart_pendapatan_per_unit.php'; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="bg d-flex flex-column justify-content-center p-4">
              <div class="chart-container">
                <?php include 'chart_spend_per_unit.php'; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        
       
      </div>
    
    </div>
  </div>
</div>






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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>


