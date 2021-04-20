<?php 

/******************************************
PRAKTIKUM RPL
******************************************/

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM tb_to_do";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
	function createData($data){
		// menampung data yang telah dimasukkan user melalui form
		$name_td = $data['nama'];
		$detail_td = $data['detail'];
		$kategori_td = $data['kategori'];
		$prioritas_td = $data['prioritas'];
		$tanggal_td = $data['tanggal'];
		$waktu_td = $data['waktu'];
		$status_td = "Belum";
	
		// query insert data ke tb_to_do
		$query = "INSERT INTO tb_to_do (nama, detail, kategori, prioritas, tanggal, waktu, status) ".
		"VALUES ('$name_td', '$detail_td', '$kategori_td', '$prioritas_td', '$tanggal_td', '$waktu_td', '$status_td')";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function deleteData($data){
		// menampung data id dari kolom yg user pilih untuk dihapus melalui tabel
		$id = $data['id_hapus'];
		// query delete data dari tb_to_do dengan id yang telah ditentukan
		$query = "DELETE FROM tb_to_do WHERE id='$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function setSudah($data){
		// menampung data id dari kolom yg user pilih untuk diset atributnya sebagai 'Sudah' melalui tabel
		$id = $data['id_status'];
		// query update data dari tb_to_do lalu set atribut status sebagai 'Sudah' dengan id yang telah ditentukan
		$query = "UPDATE tb_to_do SET status='Sudah' WHERE id='$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function orderByNama(){
		// Query mysql select data ke tb_to_do dengan order nama secara ascending
		$query = "SELECT * FROM tb_to_do ORDER BY nama ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function orderByPrioritas(){
		// Query mysql select data ke tb_to_do dengan order prioritas secara ascending
		$query = "SELECT * FROM tb_to_do ORDER BY prioritas ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function orderByTanggal(){
		// Query mysql select data ke tb_to_do dengan order tanggal secara ascending
		$query = "SELECT * FROM tb_to_do ORDER BY tanggal ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function orderByStatus(){
		// Query mysql select data ke tb_to_do dengan order status secara ascending
		$query = "SELECT * FROM tb_to_do ORDER BY status ASC";

		// Mengeksekusi query
		return $this->execute($query);
	}
}
?>