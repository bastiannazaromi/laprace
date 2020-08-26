<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <a class="btn btn-primary" type="button" href="<?= base_url('Users/form_tambahuser');?>">Tambah Data</a>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">No</th>
              <th scope="col" class="sort" data-sort="name">Nama</th>
              <th scope="col" class="sort" data-sort="budget">Password</th>
              <th scope="col" class="sort" data-sort="status">Nilai X</th>
              <th scope="col" class="sort" data-sort="status">Nilai Y</th>
              <th scope="col" class="sort" data-sort="status">Nilai W</th>
              <th scope="col" class="sort" data-sort="status">Nilai H</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody class="list">
            <?php $i=1; foreach ($isi as $key) { ?>
            <tr>
              <td><?php echo $i++;?></td>
              <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm"><?php echo $key->nama;?></span>
                  </div>
                </div>
              </th>
              <td><?php echo $key->password;?></td>
              <td><?php echo $key->nilai_x;?></td>
              <td><?php echo $key->nilai_y;?></td>
              <td><?php echo $key->nilai_w;?></td>
              <td><?php echo $key->nilai_h;?></td>
              <td class="text-center">
                <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="<?php echo base_url('Users/edit_user/'.$key->Id_user);?>">Edit</a>
                    <a class="dropdown-item" href="<?php echo base_url('Users/delete_user/'.$key->Id_user);?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>