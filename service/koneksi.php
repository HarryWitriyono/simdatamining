<?php 
class koneksidb {
	private $koneksi; //deklarasi variabel koneksinya
	function __construct() {} //deklarasi fungsi __construct
	function connect() {  //awal function connect
		$this->koneksi=new mysqli("localhost","root","","dmc45"); //buat obyek baru koneksi
		if (mysqli_connect_errno()) {  //cek apa ada error
			echo "Gagal koneksi ke server : ".mysqli_connect_error(); //tampilkan nomor errornya
		}
		return $this->koneksi; //hasilkan variabel koneksi
    } //end of function connect
} //end of class koneksidb
?>