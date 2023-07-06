<?php
  include "config/config.php";

  $role_id = 0;
  if(isset($_SESSION["SESS_HARPAN_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_HARPAN_ROLE_ID"];
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data</a></li>
          <li class="breadcrumb-item active">Inflasi</li>
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
        <!-- <div class="form-group">
          <label for="laporan-periode">Laporan Periode</label>
          <input type="date" class="form-control">
        </div> -->
      </div>
      <div class="col-4">
        <!-- <div class="form-group">
          <label for="laporan-periode">Laporan Periode</label>
          <input type="date" class="form-control">
        </div>     -->
      </div>
      <div class="col-4">
        <div class="form-group">
          <!-- <a href="#" class="btn btn-info float-right" role="button">
            <i class="fas fa-fw fa-print"></i>
            Cetak
          </a> -->
          <?php if($role_id == 2): ?>
            <a href="?page=inflasi&action=tambah" class="btn btn-success float-right mx-2" role="button">
              <i class="fas fa-fw fa-plus"></i>
              Tambah
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered custom-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Komoditi</th>
                  <th>Satuan</th>
                  <th>Harga Eceran Sekarang</th>
                  <th>Harga Eceran Sebelumnya</th>
                  <th>Nilai Inflasi</th>
                  <th>Tanggal</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody id="tabel-inflasi">
    
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  const loadData = async () => {
    return await axios.get(`<?= $base_url ?>/api/admin-inflasi.api.php`).then(res => res.data);
  }

  const renderTable = (data) => {
    const target = document.getElementById('tabel-inflasi');

    let temp = ``;

    let role_id = `<?= $role_id ?>`;

    data.forEach((res, index) => {
      temp += `
              <tr>
                <td>${index + 1}</td>
                <td>${res.nama}</td>
                <td>${res.satuan}</td>
                <td>${res.harga_baru}</td>
                <td>${res.harga_lama}</td>
                <td>${res.created_at}</td>
                
            `;

      if(role_id == 1) {
        temp += `
                <td>
                  <a href="#" class="btn btn-primary float-right mx-2" role="button">
                    <i class="fas fa-fw fa-book"></i>
                    Verifikasi
                  </a>
                </td>
              </tr>`;
      } else {
        temp += `
                <td>
                  <a href="#" class="btn btn-danger float-right" role="button">
                    <i class="fas fa-fw fa-trash"></i>
                    Hapus
                  </a>
                  <a href="#" class="btn btn-primary float-right mx-2" role="button">
                    <i class="fas fa-fw fa-edit"></i>
                    Ubah
                  </a>
                </td>
              </tr>`;
      }
    });

    target.innerHTML = temp;
  }

  const showData = async () => {
    const result = await loadData();

    if(result.status) {
      renderTable(result.data);
    }
  }

  window.addEventListener("load", async () => {
    await showData();
  })

</script>