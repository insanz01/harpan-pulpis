<?php
  include "config/config.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Komoditas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Komoditas</a></li>
          <li class="breadcrumb-item active">Tambah Komoditas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="">Nama Komoditi</label>
              <input type="text" class="form-control" placeholder="misal: telur" id="nama">
            </div>
            <div class="form-group">
              <label for="">Kategori</label>
              <input type="text" class="form-control" name="kategori" id="kategori">
            </div>
            <div class="form-group">
              <label for="">Merk</label>
              <input type="text" class="form-control" name="merk" id="merk">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Simpan Data Komoditas</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  const saveData = async (data) => {
    return await axios.post(`<?= $base_url ?>api/add-komoditas.api.php`, {
      nama: data.nama,
      kategori: data.kategori,
      merk: data.merk,
    },{
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const submitData = async () => {
    const nama = document.getElementById("nama").value;
    const kategori = document.getElementById("kategori").value;
    const merk = document.getElementById("merk").value;

    const data = {
      nama,
      kategori,
      merk,
    }

    console.log(data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=komoditas"
    }
  }
</script>