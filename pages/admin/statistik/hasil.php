<?php
  include "config/config.php";
  include_once "database/db.php";

  // include "controller/hasil-statistik-harga.controller.php";

  $id_pasar = 0;
  $id_komoditas = 0;

  if(isset($_POST['id_pasar']) && isset($_POST['id_komoditas'])) {
    $id_komoditas = $_POST['id_komoditas'];
    $id_pasar = $_POST['id_pasar'];
  }

  $role_id = 0;
  if(isset($_SESSION["SESS_HARPAN_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_HARPAN_ROLE_ID"];
  }

  $queryHargaPedagang = "SELECT sembako.id, sembako.id_pasar, sembako.petugas, harga_sembako.id_komoditas, harga_sembako.harga_pedagang_1, harga_sembako.harga_pedagang_2, harga_sembako.harga_pedagang_3, harga_sembako.harga_pedagang_4, harga_sembako.created_at FROM sembako JOIN harga_sembako ON sembako.id = harga_sembako.id_sembako JOIN komoditas ON harga_sembako.id_komoditas = komoditas.id WHERE harga_sembako.deleted_at is NULL AND harga_sembako.id_komoditas = $id_komoditas AND sembako.id_pasar = $id_pasar ORDER BY harga_sembako.id DESC LIMIT 1";

  $resultHargaPedagang = mysqli_query($connection, $queryHargaPedagang);

  $labels = ["", "pedagang 1", "pedagang 2", "pedagang 3", "pedagang 4", ""];
  $values = [0, 0, 0, 0, 0, 0];
  if($resultHargaPedagang) {
    $r = mysqli_fetch_assoc($resultHargaPedagang);

    $values[1] = $r['harga_pedagang_1'];
    $values[2] = $r['harga_pedagang_2'];
    $values[3] = $r['harga_pedagang_3'];
    $values[4] = $r['harga_pedagang_4'];
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Statistik Harga Pedagang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Harga</a></li>
          <li class="breadcrumb-item active">Harga Pedagang Pasar</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">

    <div class="row py-4">
      <div class="col-4">
        
      </div>
      <div class="col-4">
           
      </div>
      <div class="col-4">
        <div class="form-group">
          <!-- <a href="#" class="btn btn-info float-right" role="button" data-toggle="modal" data-target="#cetakModal">
            <i class="fas fa-fw fa-print"></i>
            Cetak
          </a> -->
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-10 mx-auto">
        <canvas id="myChart"></canvas>
      </div>
    </div>

  </div><!-- /.container-fluid -->
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const getHargaPedagang = async (data) => {
    return await axios.get(`<?= $base_url ?>api/harga-pedagang.api.php?id_pasar=${data.id_pasar}&id_komoditas=${data.id_komoditas}`).then(res => res.data);
  }
  
  window.addEventListener('load', async () => {

    const id_pasar = `<?= $id_pasar ?>`
    const id_komoditas = `<?= $id_komoditas ?>`
    // const id_pasar = 1;
    // const id_komoditas = 1;

    const data = {
      id_pasar,
      id_komoditas,
    }

    const result = await getHargaPedagang(data);

    console.log("result", result);
    
    if(result.status) {
      const ctx = document.getElementById('myChart');

      const hasil = result.data;
    
      const labels = ["", "pedagang 1", "pedagang 2", "pedagang 3", "pedagang 4", ""];
      const data = [0, hasil.harga_pedagang_1, hasil.harga_pedagang_2, hasil.harga_pedagang_3, hasil.harga_pedagang_4, 0];
    
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels,
          datasets: [{
            label: '# of Harga',
            data,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }
  });

</script>