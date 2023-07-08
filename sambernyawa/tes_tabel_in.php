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

    // Fetch spend data per unit
    $query_spend_per_unit = "SELECT rata_rata_per_bulan FROM spend_unit WHERE id_unit = " . $row_unit['id_unit'];
    $hasil_spend_per_unit = mysqli_query($conn, $query_spend_per_unit);

    $data_unit_spend = array();
    while ($row_spend = mysqli_fetch_assoc($hasil_spend_per_unit)) {
        $data_unit_spend[] = $row_spend['rata_rata_per_bulan'];
    }

    $data_spend_unit[] = $data_unit_spend;
}

// akhir kode pertama

// Mengubah struktur data per kolom
$data_spend_per_kolom = array();
for ($i = 0; $i < count($data_spend_unit[0]); $i++) {
    $kolom = array();
    foreach ($data_spend_unit as $data_unit) {
        $kolom[] = $data_unit[$i];
    }
    $data_spend_per_kolom[] = $kolom;
}

// Mengisi $chart_datasets dengan data per kolom
$chart_datasets = array();
foreach ($data_spend_per_kolom as $kolom) {
    $dataset = array(
        'label' => 'Spend',
        'data' => $kolom,
        'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
        'borderColor' => 'rgba(255, 99, 132, 1)',
        'borderWidth' => 1,
        'type' => 'bar',
        'yAxisID' => 'pendapatan-y-axis'
    );
    $chart_datasets[] = $dataset;
}

