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
              <label for="">Satuan</label>
              <input type="text" class="form-control" name="satuan" id="satuan">
              <!-- <select name="satuan" class="form-control" id="id_satuan">
                <option value="">- PILIH SATUAN -</option>
              </select> -->
            </div>
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" value="<?= date('Y-m-d', time()) ?>" id="tanggal">
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
      satuan: data.satuan,
      tanggal: data.tanggal,
    },{
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const loadSatuan = async () => {
    return await axios.get(`<?= $base_url ?>api/satuan.api.php`).then(res => res.data);
  }

  const submitData = async () => {
    const nama = document.getElementById("nama").value;
    const satuan = document.getElementById("satuan").value;
    const tanggal = document.getElementById("tanggal").value;

    const data = {
      nama,
      satuan,
      tanggal
    }

    console.log(data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=komoditas"
    }
  }

  const renderSelectOption = async (target, data) => {
    const listOpt = document.getElementById(target);

    let temp = `<option value="">- PILIH -</option>`

    data.forEach(res => {
      temp += `<option value="${res.id}">${res.nama}</option>`
    });

    listOpt.innerHTML = temp;
  }

  window.addEventListener('load', async () => {
    const result = await loadSatuan();

    console.log(result);

    if(result.status) {
      await renderSelectOption('id_satuan', result.data);
    }
  })
</script>