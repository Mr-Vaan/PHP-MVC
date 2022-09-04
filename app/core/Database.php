<!-- DATABASE WRAPPER -->
<?php 

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // variabel untuk koneksinya yaitu $dbh
    private $dbh; // Database Handler 
    private $stmt; // Statement

    // KONEKSI
    // Bikin Constructnya
    // Konek kedatabase dan ngambil data dari Database :
    public function __construct() 
    {
        // identitas server kita : dsn-> Data source name.
        // dns diisi dengan koneksi ke PDOnya.
        // 'mysql:host=localhost;dbname=phpmvc' kita ganti 
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        // Koneksi ke database kita juga butuh satu parameter baru untuk Option nya, nah option ini biasanya kita gunakan ketika kita ingin mengoptimasi koneksi ke database kita.
        // Jadi Kita Harus Bikin dulu nih Optionnya.
        // $Option yang isinya Array
        $option = [
            // Untuk Optimasi atau koneksi Database kita terjaga terus :
            PDO::ATTR_PERSISTENT => true,
            // MODE ERRORnya :
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // kita cek menggunakan block trycatch
        try { 
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) { // Buat Errornya 
            // Pesan Error
            die($e->getMessage());
        }
    }

    // MENJALANKAN QUERY
    //  query ini akan kita buat menjadi generik, jadi querynya bisa dipakai untuk apapun. Baik itu SELECT,INSERT,UPDATE,DELETE
    // 
    public function query($query) 
    { 
        // isinya statement->stmt,hadler->dbh,prepare()->query
        $this->stmt = $this->dbh->prepare($query); 
    }

    // Binding Data :
    public function bind($param, $value, $type = null) {
        // Kita lakukan Pengecekan menggunakan if
        if( is_null($type)) {
            switch( true ) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default : 
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Baru kita Eksekusi : 
    public function execute() 
    {
        $this->stmt->execute();
    }

    // Kita tentukan setelah di eksekusi, hasilnya kalian pengen banyak atau cuma satu aja datanya.
    // Datanya banyak
    public function resultSet() 
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // datanya cuma satu
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menghitung Ada Berapa Jumlah Baris memakai rowCount();
    // Yang ini rowCount(); punya Kita.
    public function rowCount() 
    { 
        // Yang ini rowCount(); punyanya PDO.
        return $this->stmt->rowCount();
    }

}










?>








