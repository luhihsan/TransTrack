<?php
include('koneksi.php');

// Fetch unit data
$query_unit = "SELECT DISTINCT id_unit FROM pendapatan_unit";
$hasil_unit = mysqli_query($conn, $query_unit);

// Data
$unit = array();
$data_pendapatan_unit = array();
$data_spend_unit = array();

// Fetch unit and data
while ($row_unit = mysqli_fetch_assoc($hasil_unit)) {
    $unit[] = $row_unit['id_unit'];

    // Fetch pendapatan data per unit
    $query_pendapatan_per_unit = "SELECT rata_rata_per_bulan FROM pendapatan_unit WHERE id_unit = " . $row_unit['id_unit'];
    $hasil_pendapatan_per_unit = mysqli_query($conn, $query_pendapatan_per_unit);

    $data_unit_pendapatan = array();
    while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan_per_unit)) {
        $data_unit_pendapatan[] = $row_pendapatan['rata_rata_per_bulan'];
    }

    $data_pendapatan_unit[] = $data_unit_pendapatan;

    // Fetch spend data per unit
    $query_spend_per_unit = "SELECT rata_rata_per_bulan FROM spend_unit WHERE id_unit = " . $row_unit['id_unit'];
    $hasil_spend_per_unit = mysqli_query($conn, $query_spend_per_unit);

    $data_unit_spend = array();
    while ($row_spend = mysqli_fetch_assoc($hasil_spend_per_unit)) {
        $data_unit_spend[] = $row_spend['rata_rata_per_bulan'];
    }

    $data_spend_unit[] = $data_unit_spend;
}

// Convert data format for chart.js
$chart_datasets = array();
foreach ($data_pendapatan_unit as $index => $data_unit) {
    $pendapatan_dataset = array(
        'label' => 'Unit ' . $unit[$index] . ' Pendapatan',
        'data' => $data_unit,
        'backgroundColor' => 'rgba(0, 123, 255, 0.5)',
        'borderColor' => 'rgba(0, 123, 255, 1)',
        'borderWidth' => 1,
        'type' => 'bar',
        'yAxisID' => 'pendapatan-y-axis'
    );

    $spend_dataset = array(
        'label' => 'Unit ' . $unit[$index] . ' Spend',
        'data' => $data_spend_unit[$index],
        'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
        'borderColor' => 'rgba(255, 99, 132, 1)',
        'borderWidth' => 1,
        'type' => 'bar',
        'yAxisID' => 'pendapatan-y-axis'
    );

    $chart_datasets[] = $pendapatan_dataset;
    $chart_datasets[] = $spend_dataset;
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .tabel {
            width: 1200px;
            margin: auto;
        }

        .dropdown {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="tabel">
        <canvas id="pendapatanSpendChart"></canvas>
        <script>
            // Retrieve data from PHP
            var units = <?php echo json_encode($unit); ?>;
            var datasets = <?php echo json_encode($chart_datasets); ?>;
            var labels = <?php echo json_encode($unit); ?>;
            var colors = ['rgba(0, 123, 255, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(128, 128, 128, 1)', 'rgba(255, 0, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 0, 255, 1)', 'rgba(255, 255, 0, 1)'];

            // Create chart
            var ctx = document.getElementById('pendapatanSpendChart').getContext('2d');
            var pendapatanSpendChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Pendapatan dan Spend per Unit Tahun 2023',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        pendapatan: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            id: 'pendapatan-y-axis',
                            min: 10000000,
                            max: 120000000,
                            stepSize: 10000000,
                            ticks: {
                                callback: function (value, index, values) {
                                    return value.toLocaleString();
                                }
                            },
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Pendapatan',
                                font: {
                                    size: 14
                                }
                            }
                        }
                    }
                }
            });

        </script>
    </div>
</body>
</html>
