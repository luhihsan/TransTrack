<?php
include('koneksi.php');

$data_pendapatan_perusahaan = array();
$data_spend_perusahaan = array();

// Fetch pendapatan data perusahaan
$query_pendapatan_perusahaan = "SELECT januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember FROM pendapatan_perusahaan";
$hasil_pendapatan_perusahaan = mysqli_query($conn, $query_pendapatan_perusahaan);

while ($row_pendapatan = mysqli_fetch_assoc($hasil_pendapatan_perusahaan)) {
    $data_pendapatan_perusahaan[] = $row_pendapatan;
}

// Fetch spend data perusahaan
$query_spend_perusahaan = "SELECT januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember FROM spend_perusahaan";
$hasil_spend_perusahaan = mysqli_query($conn, $query_spend_perusahaan);

while ($row_spend = mysqli_fetch_assoc($hasil_spend_perusahaan)) {
    $data_spend_perusahaan[] = $row_spend;
}

// Convert data format for chart.js
$chart_datasets = array();

$labels = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

$pendapatan_dataset = array(
    'label' => 'Pendapatan',
    'data' => array(),
    'backgroundColor' => 'rgba(0, 123, 255, 0.5)',
    'borderColor' => 'rgba(0, 123, 255, 1)',
    'borderWidth' => 1,
    'type' => 'bar',
    'yAxisID' => 'pendapatan-y-axis'
);

$spend_dataset = array(
    'label' => 'Spend',
    'data' => array(),
    'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
    'borderColor' => 'rgba(255, 99, 132, 1)',
    'borderWidth' => 1,
    'type' => 'bar',
    'yAxisID' => 'pendapatan-y-axis'
);

foreach ($data_pendapatan_perusahaan as $row_pendapatan) {
    foreach ($row_pendapatan as $pendapatan) {
        $pendapatan_dataset['data'][] = $pendapatan;
    }
}

foreach ($data_spend_perusahaan as $row_spend) {
    foreach ($row_spend as $spend) {
        $spend_dataset['data'][] = $spend;
    }
}

$chart_datasets[] = $pendapatan_dataset;
$chart_datasets[] = $spend_dataset;
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .tabel {
            width: 575px;
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
            var labels = <?php echo json_encode($labels); ?>;
            var datasets = <?php echo json_encode($chart_datasets); ?>;
            var colors = ['rgba(0, 123, 255, 0.5)', 'rgba(255, 99, 132, 0.5)'];

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
                            text: 'Pendapatan dan Spend Perusahaan Tahun 2023',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan',
                                font: {
                                    size: 14
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah',
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
