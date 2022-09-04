<?php
class Mahasiswa extends Controller {
    public function index() 
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) // artinya detail ambil parameter id dari database. 
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() 
    {
        // Untuk modelnya yang -> Mahasiswa_model.php
        // Jika Fungsi dibawah dijalankan, arahkan user ke halaman mahasiswa
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            // Sebelum Kita Redirect, kita set dulu Flash Messagenya.
            // method static
            // Sudah, Jadi kalo berhasil set SESSION-nya, arahkan ke index -> '/mahasiswa' index.php
            Flasher::setFlash(' Berhasil', 'Ditambahkan', 'success');
            
            // Pindahkan ke halaman utama
            // Redirect:
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash(' Gagal', 'Ditambahkan', 'danger');
            // Redirect:
            header('Location:' . BASEURL . '/mahasiswa');
            exit;

            // Diatas ini nanti kita gunakan untuk Setiap AKSI
        }
    }

    public function hapus($id) // Artinya, hapus id(number yang ingin dihapus)dari database.  
    {
        // Untuk modelnya yang -> Mahasiswa_model.php
        // Jika Fungsi dibawah dijalankan, arahkan user ke halaman mahasiswa
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
            // Sebelum Kita Redirect, kita set dulu Flash Messagenya.
            // method static
            // Sudah, Jadi kalo berhasil set SESSION-nya, arahkan ke index -> '/mahasiswa' index.php
            Flasher::setFlash(' Berhasil', 'Dihapus', 'success');
            
            // Pindahkan ke halaman utama
            // Redirect:
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {

            Flasher::setFlash(' Gagal', 'Dihapus', 'danger');
            // Redirect:
            header('Location:' . BASEURL . '/mahasiswa');
            exit;

            // Diatas ini nanti kita gunakan untuk Setiap AKSI
        }
    }

    public function getubah()  
    {
        // Datanya berubah menjadi json, bukan lagi Array Associative
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
    
    public function ubah()
    {

        // Untuk modelnya yang -> Mahasiswa_model.php
        // Jika Fungsi dibawah dijalankan, arahkan user ke halaman mahasiswa
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {
            // Sebelum Kita Redirect, kita set dulu Flash Messagenya.
            // method static
            // Sudah, Jadi kalo berhasil set SESSION-nya, arahkan ke index -> '/mahasiswa' index.php
            Flasher::setFlash(' Berhasil', 'Diubah', 'success');
            
            // Pindahkan ke halaman utama
            // Redirect:
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash(' Gagal', 'DiUbah', 'danger');
            // Redirect:
            header('Location:' . BASEURL . '/mahasiswa');
            exit;

            // Diatas ini nanti kita gunakan untuk Setiap AKSI
        }
        
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

}


