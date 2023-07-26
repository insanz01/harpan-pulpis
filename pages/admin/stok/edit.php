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
        <h1 class="m-0">Stok Komoditas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Komoditas</a></li>
          <li class="breadcrumb-item active">Edit Stok</li>
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
            <input type="hidden" id="id_edit" value="<?= $id_edit ?>">

            <div class="form-group">
              <label for="">Nama Komoditi</label>
              <select name="id_komoditas" class="form-control" id="id_komoditas">
                <option value="">- PILIH -</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Stok</label>
              <input type="number" class="form-control" id="stok">
            </div>
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" value="<?= date('Y-m-d', time()) ?>" id="tanggal">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Simpan Data Stok</button>
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
    return await axios.post(`<?= $base_url ?>api/edit-stok.api.php`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const loadKomoditas = async () => {
    return await axios.get(`<?= $base_url ?>api/get-komoditas.api.php`).then(res => res.data);
  }

  const loadStok = async () => {
    return await axios.get(`<?= $base_url ?>api/get-stok.api.php?id=<?= $id_edit ?>`).then(res => res.data);
  }

  const submitData = async () => {
    const id = document.getElementById("id_edit").value;
    const stok = document.getElementById("stok").value;
    const id_komoditas = document.getElementById("id_komoditas").value;
    const tanggal = document.getElementById("tanggal").value;

    const data = {
      id,
      stok,
      id_komoditas,
      tanggal
    }

    console.log(data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=stok"
    }
  }

  const renderSelectOption = async (target, data, stokData) => {
    const listOpt = document.getElementById(target);

    let temp = `<option value="">- PILIH -</option>`

    data.forEach(res => {
      if(res.id == stokData[0].id_komoditas) {
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
    const stokResult = await loadStok();

    if(komoditiResult.status && stokResult.status) {
      await renderSelectOption('id_komoditas', komoditiResult.data, stokResult.data);

      setValue("stok", stokResult.data[0].stok)
    }
  })
</script>