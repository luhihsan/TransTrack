<?php
 include 'koneksi.php';
 if (isset($_POST['more_detail'])) {
    $id_unit = $_POST['id_unit'];
  
    // Mendapatkan data unit dari tabel unit berdasarkan id_unit
    $sql = "SELECT * FROM unit WHERE id_unit = $id_unit";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) > 0) {
        // Mendapatkan data unit dari hasil query
        $row = mysqli_fetch_assoc($result);
        $nama_unit = $row['nama_unit'];
        $deskripsi_unit = $row['deskripsi_unit'];
        $foto = $row['foto'];
  
        // Tampilkan data unit yang sesuai
        echo "<h2>$nama_unit</h2>";
        echo "<p>$deskripsi_unit</p>";
        echo "<img src='$foto' class='img-fluid' alt='Foto Unit'>";
    } else {
        echo "Unit tidak ditemukan";
    }
  }
?>