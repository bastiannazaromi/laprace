<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <form method="post" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
          <div class="form-group mb-0 ">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"></span>
              </div>
              <input class="form-control" placeholder="Search by Date, Time or Name " type="text" name="keyword" autofocus="">
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Cari</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <?php if (empty($isi)) : ?>
                <div class="alert alert-danger" role="alert">
                data tidak ditemukan!.
                </div>
            <?php endif; ?>
            <tr>
              <th scope="col" class="sort" data-sort="name">No</th>
              <th scope="col" class="sort" data-sort="name">Tanggal</th>
              <th scope="col" class="sort" data-sort="budget">Waktu</th>
              <th scope="col" class="sort" data-sort="status">Nama User</th>
            </tr>
          </thead>
          <tbody class="list">
            <?php $i=1; foreach ($isi as $key) { ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo date('d M Y', strtotime($key['tanggal']));?></td>
                <td><?php echo date('H:i:s', strtotime($key['tanggal']));?> WIB</td>
                <td><?php echo $key['nama_user'];?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>