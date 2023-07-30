<?php
  include "config/config.php";

  $id_edit = 0;

  if(isset($_GET["id"])) {
    $id_edit = $_GET["id"];
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Permintaan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Permintaan</a></li>
          <li class="breadcrumb-item active">Edit Permintaan</li>
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
              <select name="id_komoditas" class="form-control" id="id_komoditas">
                <option value="">- PILIH -</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Jumlah Permintaan</label>
              <input type="number" class="form-control" id="jumlah">
              <small>* Satuan jumlah permintaan menyesuaikan satuan komoditas</small>
            </div>
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" value="<?= date('Y-m-d', time()) ?>" id="tanggal">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Simpan Data Permintaan</button>
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
    return await axios.post(`<?= $base_url ?>api/edit-permintaan.api.php`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const loadKomoditas = async () => {
    return await axios.get(`<?= $base_url ?>api/komoditas.api.php`).then(res => res.data);
  }

  const loadData = async () => {
    return await axios.get(`<?= $base_url ?>api/get-permintaan.api.php?id=<?= $id_edit ?>`).then(res => res.data);
  }

  const submitData = async () => {
    const jumlah = document.getElementById("jumlah").value;
    const id_komoditas = document.getElementById("id_komoditas").value;
    const tanggal = document.getElementById("tanggal").value;

    const data = {
      jumlah,
      id_komoditas,
      tanggal
    }

    console.log(data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=permintaan"
    }
  }

  const renderSelectOption = async (target, data, permintaanData) => {
    const listOpt = document.getElementById(target);

    let temp = `<option value="">- PILIH -</option>`

    data.forEach(res => {
      console.log(permintaanData)
      if(res.id == permintaanData[0].id_komoditas) {
        temp += `<option value="${res.id}" selected>${res.nama}</option>`
      } else {
        temp += `<option value="${res.id}">${res.nama}</option>`
      }
    });

    listOpt.innerHTML = temp;
  }

  const setValue = (target, data) => {
    document.getElementById(target).value = data;
  }

  window.addEventListener('load', async () => {
    const komoditiResult = await loadKomoditas();

    const permintaanData = await loadData();

    if(komoditiResult.status && permintaanData.status) {
      await renderSelectOption('id_komoditas', komoditiResult.data, permintaanData.data);
    
      setValue("jumlah", permintaanData.data[0].jumlah)
    }
  })
</script>