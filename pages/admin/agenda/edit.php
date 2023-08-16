<?php
  include "config/config.php";
  include_once "database/db.php";

  $id_agenda = 0;
  if(isset($_GET["id"])) {
    $id_agenda = $_GET["id"];
  }

  $agenda = [];

  $query = "SELECT * FROM agenda_pasar_murah WHERE id = $id_agenda";
  $result = mysqli_query($connection, $query);

  if($result) {
    $r = mysqli_fetch_assoc($result);

    $agenda = $r;
  }

  $komoditas = [];
  $komoditasQuery = "SELECT * FROM komoditas WHERE deleted_at is NULL";
  $komoditasResult = mysqli_query($connection, $komoditasQuery);

  if($komoditasResult) {
    if(mysqli_num_rows($komoditasResult) > 0) {
      while($r = mysqli_fetch_assoc($komoditasResult)) {
        $komoditas[] = $r;
      }
    }
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Agenda</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Agenda</a></li>
          <li class="breadcrumb-item active">Edit Agenda</li>
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
              <label for="">Lokasi Agenda</label>
              <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $agenda['lokasi'] ?>">
            </div>
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" id="tanggal" value="<?= $agenda['tanggal'] ?>">
            </div>
            <div class="form-group">
              <label for="">Jam</label>
              <input type="time" class="form-control" id="jam" value="<?= $agenda['jam_kegiatan'] ?>">
            </div>
            <div class="form-group" id="render-selected"></div>
            <div class="form-group">
              <select name="item_komoditas" id="komoditas" class="form-control" size="5" multiple="multiple" aria-label="komoditas" onchange="tambahList(this)">
                <?php foreach($komoditas as $k): ?>
                  <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            
            <div class="form-group">
              <button class="btn btn-success btn-block" type="button" role="button" onclick="submitData()">Simpan Data Agenda Pasar Murah</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  let selectedItems = [];

  const saveData = async (data) => {
    return await axios.post(`<?= $base_url ?>api/edit-agenda.api.php`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const submitData = async () => {
    const lokasi = document.getElementById("lokasi").value;
    const tanggal = document.getElementById("tanggal").value;
    const jam = document.getElementById("jam").value;

    const item_komoditas = JSON.stringify(selectedItems);

    const data = {
      lokasi,
      tanggal,
      jam_kegiatan: jam,
      item_komoditas,
    }

    console.log(data);

    const result = await saveData(data);

    console.log(result);

    if(result.status) {
      window.location.href = "<?= $base_url ?>index.php?page=admin-agenda"
    }
  }

  const checkExisting = (data) => {
    ketemu = false;
    selectedItems.forEach(res => {
      if(res.id == data.id) {
        ketemu = true;
      }
    });

    if(!ketemu) {
      selectedItems.push(data);
    }
  }

  const removeItem = (id) => {
    const temp = selectedItems.filter(res => res.id != id);

    selectedItems = [...temp];

    renderSelected();
  }

  const renderSelected = () => {
    let temp = ``;

    selectedItems.forEach(res => {
      temp += `<button class="badge badge-sm badge-pill badge-primary mx-1" onclick="removeItem(${res.id})">${res.name}</button>`
    });

    document.getElementById('render-selected').innerHTML = temp;
  }

  const tambahList = (target) => {
    var options = target.options;

    for(var i = 0; i < options.length; i++) {
      const data = {
        id: options[i].value,
        name: options[i].label
      }

      if(options[i].selected) {
        console.log('value', options[i].value);
        console.log('label', options[i].label);

        checkExisting(data);
      }
    }

    console.table(selectedItems);
    renderSelected();
  }

  const loadSelectedItems = async (id) => {
    return await axios.get(`<?= $base_url ?>api/selected-items.api.php?id=${id}`).then(res => res.data);
  }

  window.addEventListener('load', async () => {
    const id = `<?= $id_agenda ?>`

    const result = await loadSelectedItems(id);

    if(result.status) {
      const items = result.data.item_komoditas;

      if(items) {

        const parsedItems = JSON.parse(items);
  
        console.log(parsedItems);
  
        selectedItems = [...parsedItems];
  
        renderSelected();
      }
    }
  })
</script>