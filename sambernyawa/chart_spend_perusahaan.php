<?php
include('koneksi.php');

// Fetch company's income data
$query_spend_perusahaan = "SELECT januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember FROM spend_perusahaan";
$hasil_spend_perusahaan = mysqli_query($conn, $query_spend_perusahaan);

// Data
$data_spend_perusahaan = mysqli_fetch_assoc($hasil_spend_perusahaan);

// Convert data format for chart.js
$chart_dataset = array(
    'label' => 'Pengeluaran Perusahaan',
    'data' => array_values($data_spend_perusahaan),
    'backgroundColor' => 'rgba(226, 255, 0, 0.8)',
    'borderColor' => 'rgba(0, 123, 255, 1)',
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
        <canvas id="spend_usaha"></canvas>
        <script>
            // Retrieve data from PHP
            var dataset = <?php echo json_encode($chart_dataset); ?>;
            var labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var color = 'rgba(54, 162, 235, 1)';

            // Create chart
            var ctx = document.getElementById('spend_usaha').getContext('2d');
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
                            text: 'Pengeluaran Perusahaan Tahun 2023',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 700000000,
                            max: 1500000000,
                            stepSize: 5000000000,
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
