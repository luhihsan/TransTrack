<?php
include('koneksi.php');
//hitung total unit
$query_total_unit = "SELECT COUNT(*) AS total_unit FROM unit;";
$result_total_unit = mysqli_query($conn, $query_total_unit);
$row_total_unit = mysqli_fetch_assoc($result_total_unit);

//total unit rusak
$query_dmg_unit = "SELECT COUNT(DISTINCT su.id_unit) AS total_dmg FROM status_unit su WHERE su.keterangan_status = 'Memiliki catatan kerusakan';";
$result_dmg_unit = mysqli_query($conn, $query_dmg_unit);
$row_dmg_unit = mysqli_fetch_assoc($result_dmg_unit);

//total unit di bengkel
$query_rpr_unit = "SELECT COUNT(DISTINCT su.id_unit) AS total_rpr FROM status_unit su WHERE su.keterangan_status = 'Dalam perawatan di bengkel';";
$result_rpr_unit = mysqli_query($conn, $query_rpr_unit);
$row_rpr_unit = mysqli_fetch_assoc($result_rpr_unit);

//total unit normal
$query_normal_unit = "SELECT COUNT(DISTINCT su.id_unit) AS total_normal FROM status_unit su WHERE su.keterangan_status = 'Unit dalam keadaan baik';";
$result_normal_unit = mysqli_query($conn, $query_normal_unit);
$row_normal_unit = mysqli_fetch_assoc($result_normal_unit);

//profit perusahaan
$query_profit_pt = "SELECT avg_profit FROM pendapatan_perusahaan";
$result_profit_pt = mysqli_query($conn, $query_profit_pt);
$row_profit_pt = mysqli_fetch_assoc($result_profit_pt);

//spend perusahaan
$query_spend_pt = "SELECT avg_spend FROM spend_perusahaan";
$result_spend_pt = mysqli_query($conn, $query_spend_pt);
$row_spend_pt = mysqli_fetch_assoc($result_spend_pt);

//profit unit desember
$query_avg_profit_unit = "SELECT avg_profit FROM pendapatan_unit";
$result_avg_profit_unit= mysqli_query($conn, $query_avg_profit_unit);
$row_avg_profit_unit = mysqli_fetch_assoc($result_avg_profit_unit);

//spend unit desember
$query_spend_profit_unit = "SELECT avg_spend FROM spend_unit";
$result_spend_profit_unit= mysqli_query($conn, $query_spend_profit_unit);
$row_spend_profit_unit = mysqli_fetch_assoc($result_spend_profit_unit);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <style>
        .tabel_pendapatan{
            width: 700px;
            margin: auto;
        }

        .dropdown_pendapatan {
            margin-bottom: 10px;
        }
        
    
    /* Additional style to make the charts responsive */
        .chart img {
        max-width: 100%;
        }

        #unit_manager{
          width:300px
        
        }

        
        
    </style>

  </head>

  <body>
    <!-- Spinner Start -->
    <!--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div><!-->
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

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-3 fadeInUp">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <img src="" alt="">
                                <h5 class="text-uppercase">Total Unit : <?php echo isset($row_total_unit['total_unit']) ? $row_total_unit['total_unit'] : 'N/A'; ?></h5>
                                <img src="bus.png" height="50px" width="50px">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">Unit in workshop : <?php echo isset($row_rpr_unit['total_rpr']) ? $row_rpr_unit['total_rpr'] : 'N/A'; ?> </h5>
                                <img src="repair.png" height="50px" width="50px">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">Damaged Unit : <?php echo isset($row_dmg_unit['total_dmg']) ? $row_dmg_unit['total_dmg'] : 'N/A'; ?></h5>
                                <img src="bus (1).png" height="50px" width="50px">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">Normal Condition: <?php echo isset($row_normal_unit['total_normal']) ? $row_normal_unit['total_normal'] : 'N/A'; ?></h5>
                                <img src="bus-stop.png" height="50px" width="50px">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                <div class="bg-light d-flex flex-column justify-content-center p-4">
                <h5 class="text-uppercase">Latest Month Report</h5>
                <br>
                <h6 class="text-uppercase">Profit : <?php echo isset($row_profit_pt['avg_profit']) ? $row_profit_pt['avg_profit'] : 'N/A'; ?></h6>
                <h6 class="text-uppercase">Spend : <?php echo isset($row_spend_pt['avg_spend']) ? $row_spend_pt['avg_spend'] : 'N/A'; ?></h6>
                <h6 class="text-uppercase">Average Profit Per-unit : <?php echo isset($row_avg_profit_unit['avg_profit']) ? $row_avg_profit_unit['avg_profit'] : 'N/A'; ?></h6>
                <h6 class="text-uppercase">Average Spend Per-unit : <?php echo isset($row_spend_profit_unit['avg_spend']) ? $row_spend_profit_unit['avg_spend'] : 'N/A'; ?></h6>
                </div>

                </div>

                <div class="col-md-6">

                <div class="bg-light d-flex flex-column justify-content-center p-4">
                <h5 class="text-uppercase text-center">Lets See More Detail About Your Unit Manager</h5>
                <a href='team.php'>
                  
                  <div class="text-center">
                  <button type='submit' name='unit_manager' class="btn btn-success justify-content-center" id=unit_manager>
                  <img src="unit_manager.png" width="60px"  />
                  <p>Unit Manager</p>

                  </div>
               
                </button>
               
                </a>
                <br>
                
                </div>
                
                </div>

                <div class="col-md-6">

                <div class="bg-light d-flex flex-column justify-content-center p-4">
                 <?php
                    include 'dashboard_chartProfit.php'; 
                    echo "<a href='detail_pendapatanUnit.php'>"; 
                    echo "<button type='submit' name='more_detail' class='btn btn-success'>More Detail</button>"; 
                    echo "</a>";
                  ?>
                </div>

                </div>

                <div class="col-md-6">

                <div class="bg-light d-flex flex-column justify-content-center p-4">
                <?php
                    include 'dashboard_chartSpend.php';
                    echo "<a href='detail_spendUnit.php'>";
                    echo "<button type='submit' name='more_detail' class='btn btn-success'>More Detail</button>";
                    echo "</a>";   ?>
                </div>

                </div>

                <div class="col-md-6">

                <div class="bg-light d-flex flex-column justify-content-center p-4">
                <?php
                    include 'chart_pendapatan_perusahaan.php';
                  ?>
                </div>

                </div>

                <div class="col-md-6">

                <div class="bg-light d-flex flex-column justify-content-center p-4">
                <?php
                  include 'chart_spend_perusahaan.php';
                  ?>
                </div>

                </div>


                
                
            </div>
            
    </div>
</div>




    <!-- Service End -->

    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->

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
