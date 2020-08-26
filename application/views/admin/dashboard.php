<div class="row">
  <div class="col-xl-6 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h2 class="card-title text-uppercase mb-0">Mobil 1</h2>
            <span class="h3 font-weight-bold mb-0">Lap : </span>
            <span class="h3 font-weight-bold mb-0" id="mobil_1"></span>
            <br>
            <span class="h3 font-weight-bold mb-0">Waktu tempuh : </span>
            <span class="h3 font-weight-bold mb-0" id="waktu_1"></span>
          </div>
          <div class="col-auto">
            <a href="#" class="btn icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="fas fa-car"></i>
            </a>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm"></p>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h2 class="card-title text-uppercase mb-0">Mobil 2</h2>
            <span class="h3 font-weight-bold mb-0">Lap : </span>
            <span class="h3 font-weight-bold mb-0" id="mobil_2"></span>
            <br>
            <span class="h3 font-weight-bold mb-0">Waktu tempuh : </span>
            <span class="h3 font-weight-bold mb-0" id="waktu_2"></span>
          </div>
          <div class="col-auto">
            <a href="#" class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
              <i class="fas fa-car"></i>
            </a>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm"></p>
      </div>
    </div>
  </div>
  
</div>
<div class="row">
  <div class="col-xl-6 col-md-6">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0 text-center">
        <h2><b>Data Rekap Mobil 1</b></h2>
      </div>

      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush text-dark text-center">
          <thead class="text-dark text-bold bg-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">Lap</th>
              <th scope="col" class="sort" data-sort="name">Waktu Tempuh</th>
            </tr>
          </thead>
          <?php if(empty($mobil_1)) : ?>
            <tr>
              <td colspan="4">
                <div class="alert alert-danger" role="alert">
                  Data Not Found!
                </div>
              </td>
            </tr>
          <?php endif;?>
          <tbody class="list">
            <?php $i=1; foreach ($mobil_1 as $key) { ?>
              <tr>
                <td><?= $key['lap'] ;?></td>
                <td><?= $key['waktu'] . " detik" ;?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Card footer -->
  </div>

  <div class="col-xl-6 col-md-6">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0 text-center">
        <h2><b>Data Rekap Mobil 2</b></h2>
      </div>

      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush text-dark text-center">
          <thead class="text-dark text-bold bg-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">Lap</th>
              <th scope="col" class="sort" data-sort="name">Waktu Tempuh</th>
            </tr>
          </thead>
          <?php if(empty($mobil_2)) : ?>
            <tr>
              <td colspan="4">
                <div class="alert alert-danger" role="alert">
                  Data Not Found!
                </div>
              </td>
            </tr>
          <?php endif;?>
          <tbody class="list">
            <?php $i=1; foreach ($mobil_2 as $key) { ?>
              <tr>
                <td><?= $key['lap'] ;?></td>
                <td><?= $key['waktu'] . " detik" ;?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Card footer -->
  </div>

</div>

<script>

  function tampil(){
    $.ajax({
        url: "<?= base_url('Dashboard/dashboard_realtime')?>",
        dataType: 'json',
        success:function(result){
          
          $('#mobil_1').text(result["mobil_1"]);
          $('#waktu_1').text(result["waktu_1"] + " detik");
          $('#mobil_2').text(result["mobil_2"]);
          $('#waktu_2').text(result["waktu_2"] + " detik");
          
          setTimeout(tampil, 2000); 
        }
    });
  }
  
  document.addEventListener('DOMContentLoaded',function(){
    tampil();
  });   

</script>