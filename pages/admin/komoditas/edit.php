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
            <input type="hidden" id="id_edit" value="<?= $id_edit; ?>">

            <div class="form-group">
              <label for="">Nama Komoditi</label>
              <input type="text" class="form-control" placeholder="misal: telur" id="nama">
            </div>
            <div class="form-group">
              <label for="">Satuan</label>
              <!-- <select name="satuan" class="form-control" id="id_satuan">
                <option value="">- PILIH SATUAN -</option>
              </select> -->
              <input type="text" class="form-control" name="satuan" id="satuan">
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
      id_satuan: data.id_satuan,
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

  const loadData = async () => {
    return await axios.get(`<?= $base_url ?>api/get-komoditas.api.php?id=<?= $id_edit ?>`).then(res => res.data);
  }

  const submitData = async () => {
    const nama = document.getElementById("nama").value;
    const id_satuan = document.getElementById("id_satuan").value;
    const tanggal = document.getElementById("tanggal").value;

    const data = {
      nama,
      id_satuan,
      tanggal
    }

    console.log(data);

    const result = await saveData(data);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=komoditas"
    }
  }

  const renderSelectOption = async (target, data, komoditasData) => {
    const listOpt = document.getElementById(target);

    let temp = `<option value="">- PILIH -</option>`

    data.forEach(res => {
      if(res.nama == komoditasData[0].satuan) {
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
    const result = await loadSatuan();

    const komoditasData = await loadData();

    console.log(result);
    console.log(komoditasData);

    if(result.status && komoditasData.status) {
      // await renderSelectOption('id_satuan', result.data, komoditasData.data);

      setValue("nama", komoditasData.data[0].nama);
      setValue("satuan", komoditasData.data[0].satuan);
    }
  })
</script>