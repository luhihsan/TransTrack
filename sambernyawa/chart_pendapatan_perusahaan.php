<?php
include('koneksi.php');

// Fetch company's income data
$query_pendapatan_perusahaan = "SELECT januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember FROM pendapatan_perusahaan";
$hasil_pendapatan_perusahaan = mysqli_query($conn, $query_pendapatan_perusahaan);

// Data
$data_perusahaan = mysqli_fetch_assoc($hasil_pendapatan_perusahaan);

// Convert data format for chart.js
$chart_dataset = array(
    'label' => 'Pendapatan Perusahaan',
    'data' => array_values($data_perusahaan),
    'backgroundColor' => 'rgba(99, 255, 60, 0.8)',
    'borderColor' => 'rgba(0, 255, 215, 0.8)',
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
        <canvas id="pendapatan_usaha"></canvas>
        <script>
            // Retrieve data from PHP
            var dataset = <?php echo json_encode($chart_dataset); ?>;
            var labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var color = 'rgba(0, 123, 255, 1)';

            // Create chart
            var ctx = document.getElementById('pendapatan_usaha').getContext('2d');
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
                            text: 'Pendapatan Perusahaan Tahun 2023',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 2500000000,
                            max: 3400000000,
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
