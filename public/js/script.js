// $ -> ini adalah jquery
// Ketika dokumennya sudah siap, jalankan fungsi yang ada di dalamnya.
$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
    });
    //  Ini Artinya, Jquery tolong carikan saya sebuah elemen yang nama classnya '.tampilModalUbah';
    // lalu, ketikka di klik berarti .on('click', function) , jalankan fungsi berikut ini  function().
    $('.tampilModalUbah').on('click', function() {
        $('#formModalLabel').html('Ubah Data Mahasiswa'); 
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post', 
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });

});








