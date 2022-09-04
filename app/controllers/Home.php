<?php 

class Home extends Controller {
    public function index() {
        //Memanggil Sebuah views dari folder Views :
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser(); // membuat class model
        $this->view('templates/header', $data); 
        $this->view('home/index', $data);
        $this->view('templates/footer');
    } 
    
}
// jadi ketika dipanggil di sini $this->model('User_model'), ini artinya kita panggil class modelnya sekaligus melakukan instansiasi.
// Sehingga seharusnya kita bisa panggil nih methodnya,-> getUser();