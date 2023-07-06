<?php
include('koneksi.php');

// Fetch company's income data per unit
$query_jml_spend = "SELECT SUM(jumlah) AS total_pendapatan, id_unit FROM spend_unit GROUP BY id_unit ORDER BY total_pendapatan DESC;";
$hasil_jml_spend = mysqli_query($conn, $query_jml_spend);

// Data
$data_jml_spend = array();
$labels = array();
while ($row = mysqli_fetch_assoc($hasil_jml_spend)) {
    $data_jml_spend[] = $row['total_pendapatan'];
    $labels[] = $row['id_unit'];
}

// Convert data format for chart.js
$chart_dataset = array(
    'label' => 'Jumlah Spend Per Unit',
    'data' => $data_jml_spend,
    'backgroundColor' => ['rgba(99, 255, 60, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(255, 206, 86, 0.8)', 'rgba(75, 192, 192, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)', 'rgba(128, 128, 128, 0.8)', 'rgba(255, 0, 0, 0.8)', 'rgba(0, 255, 0, 0.8)', 'rgba(0, 0, 255, 0.8)', 'rgba(255, 255, 0, 0.8)'],
    'borderColor' => 'rgba(0, 0, 0, 0.8)',
    'borderWidth' => 1
);
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .tabel{
            width: 575px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="tabel">
        <canvas id="jml_spend_unit"></canvas>
        <script>
            // Retrieve data from PHP
            var dataset = <?php echo json_encode($chart_dataset); ?>;
            var labels = <?php echo json_encode($labels); ?>;

            // Create chart
            var ctx = document.getElementById('jml_spend_unit').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [dataset]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Jumlah Spend Per-Unit Tahun 2023',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'ID Unit'
                            }
                        },
                        y: {
                            beginAtZero: false,
                            min: 19000000,
                            max: 24000000,
                            stepSize: 20000000,
                            ticks: {
                                callback: function (value, index, values) {
                                    return value.toLocaleString();
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
