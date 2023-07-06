<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row pt-4">
      <div class="col-12">
        <h3>Harga Eceran</h3>
        <table class="table table-striped">
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
    <!-- Main row -->
    <div class="row">
      <div class="col-12">
        <canvas height="100px" id="eceranChart"></canvas>
      </div>
    </div>

    <div class="row pt-4">
      <div class="col-12">
        <h3>Harga Eceran</h3>
        <table class="table table-striped">
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
    <!-- Main row -->
    <div class="row">
      <div class="col-12">
        <canvas height="100px" id="nasionalChart"></canvas>
      </div>
    </div>
    <!-- /.row (main row) -->

    <div class="row pt-4">
      <div class="col-12">
        <h3>Harga Nasional</h3>
        <table class="table table-striped">
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
    <!-- Main row -->
    <div class="row">
      <div class="col-12">
        <canvas height="100px" id="grosirChart"></canvas>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  window.addEventListener('load', () => {
    const ctx = document.getElementById('eceranChart');
    const ctxGrosir = document.getElementById('grosirChart');
    const ctxNasional = document.getElementById('nasionalChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu', ''],
        datasets: [{
          label: '# Harga Eceran',
          data: [0, 12, 19, 3, 5, 2, 3, 10, 0],
          borderWidth: 1,
          borderColor: '#36A2EB',
          backgroundColor: '#9BD0F5',
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

    new Chart(ctxGrosir, {
      type: 'bar',
      data: {
        labels: ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu', ''],
        datasets: [{
          label: '# Harga Grosir',
          data: [0, 12, 19, 3, 5, 2, 3, 10, 0],
          borderWidth: 1,
          borderColor: '#90EE90',
          backgroundColor: '#90EE90',
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

    new Chart(ctxNasional, {
      type: 'bar',
      data: {
        labels: ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu', ''],
        datasets: [{
          label: '# Harga Nasional',
          data: [0, 12, 10, 3, 5, 19, 13, 10, 0],
          borderWidth: 1,
          borderColor: '#FA8072',
          backgroundColor: '#FA8072',
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