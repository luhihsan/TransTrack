<?php
session_start();
$_SESSION['status']=false;
echo $_SESSION['status'];
header('location:..login.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>CarServ - Car Repair HTML Template</title>
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

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(gambar1.png)">
      <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
          <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item text-white active" aria-current="page"></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-4">
          <a href="booking.html">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex bg-light py-5 px-4">
                  <div class="ps-4">
                    <h5 class="mb-3">Dashboard</h5>
                    <img src="bus-station.png" width="50%">
                  </div>
                </div>
          </a>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <a href="team.html">
              <div class="d-flex bg-light py-5 px-4">
              <div class="ps-4">
                <h5 class="mb-3">Driver Manager</h5>
                <img src="bus-driver.png" width="50%">
              </div>
            </div></a>
            
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="d-flex bg-light py-5 px-4">
              <div class="ps-4">
                <h5 class="mb-3">Data Usability</h5>
                <img src="bus-schedule.png" width="50%">
              </div>
            </div>
          </div>
          
          
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <a href="testimonial.html"><div class="d-flex bg-light py-5 px-4">
              <div class="ps-4">
                <h5 class="mb-3">Unit Diagnostics</h5>
                <img src="bus (2).png" width="50%">
              </div>
            </div></a>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Service End -->

    <!-- Back to Top -->
    <!--<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>-->

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
