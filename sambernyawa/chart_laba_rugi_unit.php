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
    $unit_array = array();
        foreach ($unit as $value) {
            $unit_array[] = $value;
        }

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


// DATA PENDAPATAN
// awal kode
$data_pendapatan_per_kolom = array();
for ($i = 0; $i < count($data_pendapatan_unit[0]); $i++) {
    $kolom = array();
    foreach ($data_pendapatan_unit as $data_unit) {
        $kolom[] = $data_unit[$i];
    }
    $data_pendapatan_per_kolom[] = $kolom;
}

// Mengisi $chart_datasets dengan data per kolom
$chart_datasets = array();
foreach ($data_pendapatan_per_kolom as $kolom) {
    $dataset = array(
        'label' => 'Pendapatan',
        'data' => $data_pendapatan_per_kolom,
        'backgroundColor' => 'rgba(0, 123, 255, 0.5)',
        'borderColor' => 'rgba(0, 123, 255, 1)',
        'borderWidth' => 1,
        'type' => 'bar',
        'yAxisID' => 'pendapatan-y-axis'
    );
    $chart_datasets[] = $dataset;
}

// akhir kode pertama


// DATA SPEND
// Mengubah struktur data per kolom
$data_spend_per_kolom = array();
for ($i = 0; $i < count($data_spend_unit[0]); $i++) {
    $kolom = array();
    foreach ($data_spend_unit as $data_unit) {
        $kolom[] = $data_unit[$i];
    }
    $data_spend_per_kolom[] = $kolom;
}





// TABEL SPEND
// Mengisi $chart_datasets dengan data per kolom
$chart_datasets = array();
foreach ($data_spend_per_kolom as $kolom) {
    $dataset = array(
        'label' => 'Pengeluaran per Unit',
        'data' => $kolom,
        'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
        'borderColor' => 'rgba(255, 99, 132, 1)',
        'borderWidth' => 1,
        'type' => 'bar',
        'yAxisID' => 'pendapatan-y-axis'
    );
    $chart_datasets[] = $dataset;
}


// ini terakhir
// TABEL SPEND

foreach ($data_pendapatan_per_kolom as $index => $data_unit) {
    

    $spend_dataset = array(
        'label' =>  ' Pendapatan' . ' per Unit '  ,
        'data' => $data_pendapatan_per_kolom[$index], // Perubahan disini
        'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
        'borderColor' => 'rgba(255, 99, 132, 1)',
        'borderWidth' => 1,
        'type' => 'bar',
        'yAxisID' => 'pendapatan-y-axis'
    );

    $chart_datasets[] = $spend_dataset;
}


$urutan = array_merge($dataset, $spend_dataset);
// Convert data format for chart.js
$maxDataLength = max(array_map('count', $data_pendapatan_per_kolom)); // Mencari panjang maksimum data

// Calculate number of dropdown options

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

    </style>
</head>
<body>
    <div class="tabel">
       
        <canvas id="pendapatanSpendChartunit"></canvas>
        <script>
            // Retrieve data from PHP
            var units = <?php echo json_encode($unit); ?>;
            var datasets = <?php echo json_encode($chart_datasets); ?>;
            var labels = <?php echo json_encode($unit_array); ?>;
            
            var colors = ['rgba(0, 123, 255, 0.5)', 'rgba(255, 99, 132, 0.5)' ];

            // Create chart
            var ctx = document.getElementById('pendapatanSpendChartunit').getContext('2d');
            var pendapatanSpendChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets.slice(0, 10).map(function(dataset, index) {
                        dataset.borderColor = colors[index % colors.length];
                        dataset.backgroundColor = colors[index % colors.length] + '0.5)';
                        return dataset;
                    })
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
                        x: {
                            title: {
                                display: true,
                                text: 'Unit',
                                font: {
                                    size: 14
                                }
                            }
                        },
                    }
                }
            });
        </script>
    </div>
</body>
</html>