<?php
  include "config/config.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Harga Nasional</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="jumbrotron">
        <h3 class="display-4">Selamat Datang di Sistem Informasi Harga Pangan Pokok Pasar Antasari</h3>
      </div>
    </div>
  </div>

    <div class="row pt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3>Harga Nasional</h3>
            <table class="table table-striped custom-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Komoditi</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Beras Banjar Super</td>
                  <td>Kg</td>
                  <td>14000</td>
                  <td>2023-02-08</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Telur</td>
                  <td>Butir</td>
                  <td>1500</td>
                  <td>2023-02-06</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Main row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <canvas height="100px" id="hargaChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  window.addEventListener('load', () => {
    const ctx = document.getElementById('hargaChart');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu', ''],
        datasets: [{
          label: '# Harga Nasional',
          data: [0, 12, 19, 3, 5, 2, 3, 10, 0],
          borderWidth: 1,
          borderColor: '#FA8072',
          // backgroundColor: '#FA8072',
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

  })
</script>