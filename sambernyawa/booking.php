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

// Fetch unit data
$query_unit = "SELECT DISTINCT id_unit FROM pendapatan_unit";
$hasil_unit = mysqli_query($conn, $query_unit);

// Data
$unit = array();
$data_per_unit = array();

// Fetch unit and data
while ($row_unit = mysqli_fetch_assoc($hasil_unit)) {
    $unit[] = $row_unit['id_unit'];

    // Fetch pendapatan data per unit
    $query_pendapatan_per_unit = "SELECT id_pendapatan, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember FROM pendapatan_unit WHERE id_unit = " . $row_unit['id_unit'];
    $hasil_pendapatan_per_unit = mysqli_query($conn, $query_pendapatan_per_unit);

    $data_unit = array();
    while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan_per_unit)) {
        $data_unit['januari'] = $row_pendapatan['januari'];
        $data_unit['februari'] = $row_pendapatan['februari'];
        $data_unit['maret'] = $row_pendapatan['maret'];
        $data_unit['april'] = $row_pendapatan['april'];
        $data_unit['mei'] = $row_pendapatan['mei'];
        $data_unit['juni'] = $row_pendapatan['juni'];
        $data_unit['juli'] = $row_pendapatan['juli'];
        $data_unit['agustus'] = $row_pendapatan['agustus'];
        $data_unit['september'] = $row_pendapatan['september'];
        $data_unit['oktober'] = $row_pendapatan['oktober'];
        $data_unit['november'] = $row_pendapatan['november'];
        $data_unit['desember'] = $row_pendapatan['desember'];
    }

    $data_per_unit[] = $data_unit;
}

// Convert data format for chart.js
$chart_datasets = array();
foreach ($data_per_unit as $index => $data_unit) {
    $dataset = array(
        'label' => 'Unit ' . $unit[$index],
        'data' => array_values($data_unit),
        'backgroundColor' => 'rgba(0, 123, 255, 0.5)',
        'borderColor' => 'rgba(0, 123, 255, 1)',
        'borderWidth' => 1
    );
    $chart_datasets[] = $dataset;
}


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
            <div class="nav-item dropdown">
              
              <div class="dropdown-menu fade-up m-0">
                <a href="booking.html" class="dropdown-item"></a>
                <a href="team.html" class="dropdown-item"></a>
                <a href="testimonial.html" class="dropdown-item"></a>
                <a href="404.html" class="dropdown-item"></a>
              </div>
            </div>
            <a href="contact.html" class="nav-item nav-link"></a>
          </div>
          <a href="about.html" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">Menu<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
      </nav>
    <!-- Navbar End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        
        <div class="row g-4" >
          <div class="col-12">
            <div class="row gy-4">
              <div class="col-md-3 fadeInUp">
                <div class="bg-light d-flex flex-column justify-content-center p-4">
                  <img src="" alt="">
                  <h5 class="text-uppercase">Total Unit : <?php echo isset($row_total_unit['total_unit']) ? $row_total_unit['total_unit'] : 'N/A'; ?></h5> 
                  <img src="bus.png" height="50px" width="50px"  >
                  
                </div>
              </div>
              <div class="col-md-3">
                <div class="bg-light d-flex flex-column justify-content-center p-4">
                  <h5 class="text-uppercase">Unit in workshop : <?php echo isset($row_rpr_unit['total_rpr']) ? $row_rpr_unit['total_rpr'] : 'N/A'; ?> </h5> <img src="repair.png" height="50px" width="50px">
                  
                </div>
              </div>
              <div class="col-md-3">
                <div class="bg-light d-flex flex-column justify-content-center p-4">
                  <h5 class="text-uppercase">Damaged Unit : <?php echo isset($row_dmg_unit['total_dmg']) ? $row_dmg_unit['total_dmg'] : 'N/A'; ?></h5> <img src="bus (1).png " height="50px" width="50px">
                  
                </div>
                
              </div>
              <div class="col-md-3">
                <div class="bg-light d-flex flex-column justify-content-center p-4">
                  <h5 class="text-uppercase">Normal Condition: <?php echo isset($row_normal_unit['total_normal']) ? $row_normal_unit['total_normal'] : 'N/A'; ?></h5> <img src="bus-stop.png" height="50px" width="50px">
                  
                </div>
                
              </div>
            </div>
          </div>
        <p>
          <p></p>
        </p>
        <?php
        include 'lineChart_spendUnit.php';
      ?>
        <div class="chart">
        <div class="tabel_pendapatan">
    <div class="dropdown_pendapatan">
        <select id="unitDropdown" onchange="updateChart()">
            <?php
            $groupCount = ceil(count($unit) / 5);
            for ($i = 1; $i <= $groupCount; $i++) {
                $start = ($i - 1) * 5 + 1;
                $end = min($i * 5, count($unit));
                echo '<option value="' . $i . '">Units ' . $start . '-' . $end . '</option>';
            }
            ?>
        </select>
    </div>
    <canvas id="stockChart"></canvas>
        <script>
            // Retrieve data from PHP
            var units = <?php echo json_encode($unit); ?>;
            var datasets = <?php echo json_encode($chart_datasets); ?>;
            var labels = Object.keys(datasets[0].data);
            var colors = ['rgba(0, 123, 255, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(128, 128, 128, 1)', 'rgba(255, 0, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 0, 255, 1)', 'rgba(255, 255, 0, 1)'];

            // Create chart with default data (first 5 units)
            var ctx = document.getElementById('stockChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: datasets.slice(0, 5).map(function(dataset, index) {
                        dataset.borderColor = colors[index % colors.length];
                        dataset.backgroundColor = colors[index % colors.length] + '0.5)';
                        return dataset;
                    })
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Rata-Rata Pendapatan Bulanan per Unit Tahun 2023',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 90000000,
                            max: 125000000,
                            stepSize: 5000000,
                            ticks: {
                                callback: function (value, index, values) {
                                    return value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // Function to change displayed data based on selected range
            function updateChart() {
            var dropdown = document.getElementById('unitDropdown');
            var selectedGroup = dropdown.options[dropdown.selectedIndex].value;

            var startIndex = (selectedGroup - 1) * 5;
            var endIndex = selectedGroup * 5;

            var filteredDatasets = datasets.slice(startIndex, endIndex);

            chart.data.datasets = filteredDatasets.map(function (dataset, index) {
                dataset.borderColor = colors[index % colors.length];
                dataset.backgroundColor = colors[index % colors.length] + '0.5)';
                return dataset;
            });

            chart.update();
        }
        </script>
    </div>

        </div>
       

      
        
          
    <!-- Service End -->

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
