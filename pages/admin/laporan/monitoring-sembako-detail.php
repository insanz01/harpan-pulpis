<?php
  include "./database/db.php";

  $id_sembako = $_POST["additional_data"];

  $tipeFilter = $_POST["tipe_filter"];
  $dataFilterBulan = $_POST["data_filter_bulan"];
  // $dataFilterPekan = $_POST["data_filter_pekan"];
  $dataFilterPekanAwal = $_POST["data_filter_pekan_awal"];
  $dataFilterPekanAkhir = $_POST["data_filter_pekan_akhir"];

  $query = "SELECT harga_sembako.*, komoditas.nama as komoditas FROM harga_sembako JOIN komoditas ON harga_sembako.id_komoditas = komoditas.id WHERE harga_sembako.deleted_at is NULL AND harga_sembako.id_sembako = $id_sembako ORDER BY harga_sembako.created_at DESC, harga_sembako.id_komoditas ASC";

  if($tipeFilter == "BULANAN") {
    $query = "SELECT harga_sembako.*, komoditas.nama as komoditas FROM harga_sembako JOIN komoditas ON harga_sembako.id_komoditas = komoditas.id WHERE harga_sembako.deleted_at is NULL AND harga_sembako.id_sembako = $id_sembako AND MONTH(harga_sembako.created_at) = $dataFilterBulan ORDER BY harga_sembako.created_at DESC, harga_sembako.id_komoditas ASC";
  } else if($tipeFilter == "MINGGUAN") {
    // $weekNumber = date("W", strtotime($dataFilterPekan));

    // $query = "SELECT sembako.*, pasar.nama FROM sembako JOIN pasar ON sembako.id_pasar = pasar.id WHERE sembako.deleted_at is NULL AND WEEK(sembako.created_at) = $weekNumber";
    $query = "SELECT harga_sembako.*, komoditas.nama as komoditas FROM harga_sembako JOIN komoditas ON harga_sembako.id_komoditas = komoditas.id WHERE harga_sembako.deleted_at is NULL AND harga_sembako.id_sembako = $id_sembako AND ((DATE(harga_sembako.created_at) BETWEEN '$dataFilterPekanAwal' AND '$dataFilterPekanAkhir') OR DATE(harga_sembako.created_at) = '$dataFilterPekanAwal' OR DATE(harga_sembako.created_at) = '$dataFilterPekanAkhir') ORDER BY harga_sembako.created_at DESC, harga_sembako.id_komoditas ASC";
  }

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

    <title>Laporan Monitoring Sembako</title>
  </head>
  <body>

  <img src="./dist/img/pulpis.png" width="8%" height="8%" align="left"/>
        <p align="center"><b>

        <font size="4">PEMERINTAH KABUPATEN PULANG PISAU</font> <br>
        <font size="4">PERINDUSTRIAN PERDAGANGAN KOPERASI DAN UKM</font> </b><br>
        <font size="2"> Jalan Mantaren I, Kec. Kahayan Hilir, Kabupaten Pulang Pisau, Kalimantan Tengah</font><br>
        <font size="2">Email: disperindagkop@gmail.co.id</font> 
        <br><br>
        <hr size="2px" color="black">
        </p>
	<center>
		<h4>DATA LAPORAN MONITORING SEMBAKO</h4>
	</center>

  <table border="1" style="width: 100%">
  <thead>
              <th>No</th>
              <th>Nama Sembako</th>
              <th>Harga Pedagang 1</th>
              <th>Harga Pedagang 2</th>
              <th>Harga Pedagang 3</th>
              <th>Harga Pedagang 4</th>
              <th>Tanggal Monitor</th>
            </thead>
    <tbody>
              <?php if(mysqli_num_rows($result) > 0): ?>
                <?php $number = 1; ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td><?= $number++ ?></td>
                    <td><?= $row['komoditas'] ?></td>
                    <td><?= $row['harga_pedagang_1'] ?></td>
                    <td><?= $row['harga_pedagang_2'] ?></td>
                    <td><?= $row['harga_pedagang_3'] ?></td>
                    <td><?= $row['harga_pedagang_4'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                  </tr>
                <?php endwhile; ?>
              <?php endif; ?>
            </tbody>
	</table>
  <br>
	<div style="text-align: center; display: inline-block; float: right;">
    <h5>
    Pulang Pisau, <?php echo (date('d M Y')); ?>
			<br>KEPALA DINAS<br>
			<br>
      <br>
            
            <br>
            <br>
            <br><u>ELIESER JAYA, S.Sos</u>
            <br>Pembina Utama Muda
            <br>NIP. 19681010 199009 1 002
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