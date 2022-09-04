<?php 

class Flasher {
    // Kita akan membuat dua buah method yang akan dibuat method static. Agar kita dapat memanggil methodnya tanpa harus melakukan instansiasi
    // pada class Flasher ini.

    public static function setFlash($pesan, $aksi, $tipe) 
    {
        $_SESSION['flash'] =[ // Isi dengan Array :
            // Ambil dari parameter :
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    
    // Untuk Melakukan Flashnya, Untuk Menampilkan Pesannya

    public static function flash() 
    {
        if( isset($_SESSION['flash'])) {
            // alert-' . $_SESSION['flash']['tipe'] . ' -> KITA CONCAT.
            echo ' 
            <div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                Data Mahasiswa<strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            // Jika datanya berhasil ditampilkan baru kita hapus SESSIONnya,jadi hanya berlaku 1 kali menggunakan fungsi unset().
            // Sehingga ketika halamannya di refresh atau pindah halaman, SESSIONnya udah tidak ada lagi.
            unset($_SESSION['flash']);
         
            // SELANJUTNYA, biar Flasher.php ini jalan, kita panggil di init.phpnya
            // -- Sedang Ke init.php --
            // Selanjutnya, Karena kita bekerja dengan SESSION, Kita harus jalankan SESSIONNYA
            // Buka index.php paling luar
        }
    }
}

?>