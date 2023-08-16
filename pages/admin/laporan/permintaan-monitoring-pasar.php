<?php
  include "./database/db.php";

  $tipeFilter = $_POST["tipe_filter"];
  $dataFilterBulan = $_POST["data_filter_bulan"];
  // $dataFilterPekan = $_POST["data_filter_pekan"];
  $dataFilterPekanAwal = $_POST["data_filter_pekan_awal"];
  $dataFilterPekanAkhir = $_POST["data_filter_pekan_akhir"];

  // $query = "SELECT pm.id, pm.id_pasar, p.nama as pasar, pm.petugas, pm.tanggal, pm.approved_at, pm.created_at FROM permintaan_monitor pm JOIN pasar p ON pm.id_pasar = p.id WHERE pm.deleted_at is null WHERE  permintaan_monitor.approved_at is not null";
  $query = "SELECT pm.id, pm.id_pasar, p.nama as pasar, pm.petugas, pm.tanggal, pm.approved_at, pm.created_at FROM permintaan_monitor pm JOIN pasar p ON pm.id_pasar = p.id WHERE pm.deleted_at is null";

  if($tipeFilter == "BULANAN") {
    // $query = "SELECT pm.id, pm.id_pasar, p.nama as pasar, pm.petugas, pm.tanggal, pm.approved_at, pm.created_at FROM permintaan_monitor pm JOIN pasar p ON pm.id_pasar = p.id WHERE pm.deleted_at is null WHERE MONTH(permintaan_monitor.created_at) = $dataFilterBulan AND permintaan_monitor.approved_at is not null";
    $query = "SELECT pm.id, pm.id_pasar, p.nama as pasar, pm.petugas, pm.tanggal, pm.approved_at, pm.created_at FROM permintaan_monitor pm JOIN pasar p ON pm.id_pasar = p.id WHERE pm.deleted_at is null AND MONTH(pm.created_at) = $dataFilterBulan";
  } else if($tipeFilter == "MINGGUAN") {
    // $weekNumber = date("W", strtotime($dataFilterPekan));

    // $query = "SELECT * FROM permintaan_monitor WHERE WEEK(permintaan_monitor.created_at) = $weekNumber";
    // $query = "SELECT * FROM permintaan_monitor WHERE ((DATE(permintaan_monitor.created_at) BETWEEN '$dataFilterPekanAwal' AND '$dataFilterPekanAkhir)' OR DATE(permintaan_monitor.created_at) = '$dataFilterPekanAwal' OR DATE(permintaan_monitor.created_at) = '$dataFilterPekanAkhir') AND permintaan_monitor.approved_at is not null";
    $query = "SELECT pm.id, pm.id_pasar, p.nama as pasar, pm.petugas, pm.tanggal, pm.approved_at, pm.created_at FROM permintaan_monitor pm JOIN pasar p ON pm.id_pasar = p.id WHERE pm.deleted_at is null AND ((DATE(pm.created_at) BETWEEN '$dataFilterPekanAwal' AND '$dataFilterPekanAkhir') OR DATE(pm.created_at) = '$dataFilterPekanAwal' OR DATE(pm.created_at) = '$dataFilterPekanAkhir')";
  }

  var_dump($query);

  $result = mysqli_query($connection, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Laporan Permintaan Monitoring Pasar</title>
  </head>
  <body>

  <img src="./dist/img/Kayuh_Baimbai.png" width="20%" height="20%" align="left"/>
        <p align="center"><b>

        <font size="4">PEMERINTAH KOTA BANJARMASIN</font> <br>
        <font size="4">DINAS KETAHANAN PANGAN, PERTANIAN DAN PERIKANAN</font> </b><br>
        <font size="2">Jln. Pangeran Hidayatullah/Lingkar Dalam Utara Telp./fax. 0511-3201327</font><br>
        <font size="2">Komplek Screen House, Banjarmasin Timur 70239 Email: distankan@yahoo.co.id</font> 
        <br><br>
        <hr size="2px" color="black">
        </p>
	<center>
		<h4>DATA LAPORAN PERMINTAAN MONITOR</h4>
	</center>

  <table border="1" style="width: 100%">
  <thead>
              <th>#</th>
              <th>Petugas</th>
              <th>Pasar</th>
              <th>Tanggal</th>
              <th>Status</th>
            </thead>
    <tbody>
              <?php if(mysqli_num_rows($result) > 0): ?>
                <?php $number = 1; ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td><?= $number++ ?></td>
                    <td><?= $row['petugas'] ?></td>
                    <td><?= $row['pasar'] ?></td>
                    <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                    <td>
                      <?php if($row['approved_at']): ?>
                        Terverifikasi
                      <?php else: ?>
                        Belum Diverifikasi
                      <?php endif; ?>  
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php endif; ?>
            </tbody>
	</table>
  <br>
	<div style="text-align: center; display: inline-block; float: right;">
    <h5>
            Banjarmasin, <?php echo (date('d M Y')); ?>
			<br>KEPALA DINAS<br>
			<br>
      <br>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://docs.google.com/document/d/1RaNzveyGzqboGg884gWIyA26_nCE1jTwptyOsV0zSWg/edit?usp=sharing" alt="TTD QR">
            <br>
            <br>
            <br><u>Ir. M. MAKHMUD, MS</u>
            <br>Pembina Utama Muda
            <br>NIP. 19650328 198803 1 009
    </h5> 
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <script>
      window.print()
    </script>
  </body>
</html>