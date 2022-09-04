<div class="container mt-3">
  
  <div class="row">
    <div class="col-lg-6">
      <!-- Karena Methodnya static, jadi memanggilnya memakai titik 2(::), contoh -> Flasher::flash(); -->
      <!-- Tampil pesan flashnya -->
      <!-- Selanjutnya, untuk ngesetnya dimana? nah taro saja di controller Mahasiswa.php nya -->
      <?php Flasher::flash(); ?> 
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Mahasiswa
      </button>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
      <div class="input-group ">
        <input type="text" class="form-control" placeholder="Cari Data Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
      </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar Mahasiswa</h3>
      <ul class="list-group">
        <?php foreach( $data['mhs'] as $mhs ) : ?>
          <li class="list-group-item">
            <?= $mhs['nama']; ?>
            <!-- BISA SAJA KITA MEMAKAI SWEET ALERT UNTUK FRAMEWORK POP UP -->
            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary btn-primary float-right">Detail</a>
            <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success btn-success float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-bs-id="<?= $mhs['id']; ?>">Ubah</a>
            <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger btn-danger float-right" onclick="return confirm('yakin?');">Hapus</a>
            <!-- <div class="d-flex justify-content-end">
              </div> -->
          </li>
        <?php endforeach; ?>
      </ul>  
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <!-- BASEURL Keluarannya -> http://localhost:8080/phpmvc/public/... -->
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
              <label for="nama">Nama</label>
              <!-- name="nama" -> buat diambil Associative Arraynya nanti. -->
              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required> 
          </div>
          <div class="form-group">
              <label for="nrp">NRP</label>
              <!-- name="nrp" -> buat diambil Associative Arraynya nanti. -->
              <input type="number" class="form-control" id="nrp" name="nrp" autocomplete="off"> 
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <!-- name="email" -> buat diambil Associative Arraynya nanti. -->
              <input type="email" class="form-control" id="email" name="email" autocomplete="off"> 
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
              <select class="form-control" id="jurusan" name="jurusan" autocomplete="off">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Industri">Teknik Industri</option>
                <option value="Teknik Pangan">Teknik Pangan</option>
                <option value="Teknik Planologi">Teknik Planologi</option>
                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
              </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

























