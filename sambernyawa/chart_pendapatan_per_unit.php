<?php
include('koneksi.php');
if (isset($_POST['usability'])) {
    $selectedUnit = $_POST['id_unit'];
// Fetch unit data
$query_unit = "SELECT DISTINCT id_unit FROM pendapatan_unit WHERE id_unit = '$selectedUnit'";
$hasil_unit = mysqli_query($conn, $query_unit);

// Data
$unit = array();
$data_per_unit = array();

// Fetch unit and data
while ($row_unit_hasil = mysqli_fetch_assoc($hasil_unit)) {
  $unit[] = $row_unit_hasil['id_unit'];

  // Fetch pendapatan data per unit
  $query_pendapatan_per_unit = "SELECT januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember FROM pendapatan_unit WHERE id_unit = '$selectedUnit' AND id_unit = " . $row_unit['id_unit'];
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
        'backgroundColor' => 'rgba(0, 255, 61, 0.8)',
        'borderColor' => 'rgba(0, 255, 61, 0.8)',
        'borderWidth' => 1
    );
    $chart_datasets[] = $dataset;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .tabel{
            width: 700px;
            margin: auto;
        }

        .dropdown {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="tabel">
   
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
                type: 'bar',
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
</body>
</html>
