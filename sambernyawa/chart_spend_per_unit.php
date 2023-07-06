<?php
include('koneksi.php');
if (isset($_POST['usability'])) {
    $selectedUnit = $_POST['id_unit'];

// Fetch unit data
$query_unit_spend = "SELECT DISTINCT id_unit FROM spend_unit WHERE id_unit='$selectedUnit'";
$hasil_unit_spend = mysqli_query($conn, $query_unit_spend);

// Data
$unit_spend = array();
$data_per_unit_spend = array();

// Fetch unit and data
while ($row_unit_spend = mysqli_fetch_assoc($hasil_unit_spend)) {
    $unit_spend[] = $row_unit_spend['id_unit'];

    // Fetch pendapatan data per unit
    $query_spend_per_unit = "SELECT id_spend, januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember FROM spend_unit WHERE  id_unit = '$selectedUnit' AND id_unit = " . $row_unit_spend['id_unit'];
    $hasil_spend_per_unit = mysqli_query($conn, $query_spend_per_unit);

    $data_unit_spend = array();
    while ($row_spend = mysqli_fetch_assoc($hasil_spend_per_unit)) {
        $data_unit_spend['januari'] = $row_spend['januari'];
        $data_unit_spend['februari'] = $row_spend['februari'];
        $data_unit_spend['maret'] = $row_spend['maret'];
        $data_unit_spend['april'] = $row_spend['april'];
        $data_unit_spend['mei'] = $row_spend['mei'];
        $data_unit_spend['juni'] = $row_spend['juni'];
        $data_unit_spend['juli'] = $row_spend['juli'];
        $data_unit_spend['agustus'] = $row_spend['agustus'];
        $data_unit_spend['september'] = $row_spend['september'];
        $data_unit_spend['oktober'] = $row_spend['oktober'];
        $data_unit_spend['november'] = $row_spend['november'];
        $data_unit_spend['desember'] = $row_spend['desember'];
    }

    $data_per_unit_spend[] = $data_unit_spend;
}

// Convert data format for chart.js
$chart_datasets = array();
foreach ($data_per_unit_spend as $index => $data_unit_spend) {
    $dataset = array(
        'label' => 'Unit ' . $unit_spend[$index],
        'data' => array_values($data_unit_spend),
        'backgroundColor' => 'rgba(255, 74, 74, 0.8)',
        'borderColor' => 'rgba(255, 74, 74, 0.8)',
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
    
    <canvas id="spend_per_unit"></canvas>
        <script>
            // Retrieve data from PHP
            var units_spend = <?php echo json_encode($unit_spend); ?>;
            var datasets = <?php echo json_encode($chart_datasets); ?>;
            var labels = Object.keys(datasets[0].data);
            var colors = [ 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(128, 128, 128, 1)', 'rgba(255, 0, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 0, 255, 1)', 'rgba(255, 255, 0, 1)'];

            // Create chart with default data (first 5 units)
            var ctx = document.getElementById('spend_per_unit').getContext('2d');
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
                            text: 'Rata-Rata Pengeluaran Bulanan per Unit Tahun 2023',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 10000000,
                            max: 25000000,
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
