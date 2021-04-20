<?php

/******************************************
PRAKTIKUM RPL
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Task.class.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

// Memanggil method getTask di kelas Task jika user menekan tombol 'Reset Sort'
if(isset($_POST['reset'])){
	$otask->getTask();
}

// Memanggil method untuk melakukan dgn  order secara ascending jika user menekan tombol order sesuai atribut yg ingin di-order
if(isset($_POST['namaOrder'])){
	$otask->orderByNama();
}
else if(isset($_POST['prioritasOrder'])){
	$otask->orderByPrioritas();
}
else if(isset($_POST['tanggalOrder'])){
	$otask->orderByTanggal();
}
else if(isset($_POST['statusOrder'])){
	$otask->orderByStatus();
}
else{ // jika tidak melakukan order
	// cukup panggil method getTask, yg akan mengeksekusi select data tanpa melakukan sorting sesuai atribut tertentu
	$otask->getTask();
}

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($id, $nama, $detail, $kategori, $prioritas, $tanggal, $waktu, $status) = $otask->getResult()) {
	// Tampilan jika status task nya sudah dikerjakan
	if($status == "Sudah"){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nama . "</td>
		<td>" . $detail . "</td>
		<td>" . $kategori . "</td>
		<td>" . $prioritas . "</td>
		<td>" . $tanggal . "</td>
		<td>" . $waktu . "</td>
		<td>" . $status . "</td>
		<td>
		<button class='btn btn-outline-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status task nya belum dikerjakan
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nama . "</td>
		<td>" . $detail . "</td>
		<td>" . $kategori . "</td>
		<td>" . $prioritas . "</td>
		<td>" . $tanggal . "</td>
		<td>" . $waktu . "</td>
		<td>" . $status . "</td>
		<td>
		<button class='btn btn-outline-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-outline-success' ><a href='index.php?id_status=" . $id .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}

// jika user melakukan penambahan data
if(isset($_POST['add'])){
	// memanggil method createData
	$otask->createData($_POST);
	// lalu lempar jendela halaman web menuju ke index.php
	echo "<script>
	document.location=('index.php');
	</script>";
}

// jika user melakukan penghapusan data pada row tabel
if(isset($_GET['id_hapus'])){
	$otask->deleteData($_GET);
	// lalu lempar jendela halaman web menuju ke index.php
	echo "<script>
	document.location=('index.php');
	</script>";
	// meng-unset method GET dari id_hapus jika sudah selesai digunakan
	unset($_GET['id_hapus']);
}

// jika user melakukan telah melakukan penyelesaian pekerjaan pada row tabel
if(isset($_GET['id_status'])){
	$otask->setSudah($_GET);
	echo "<script>
	document.location=('index.php');
	</script>";
}

// Menutup koneksi database
$otask->close();

// Membaca template skin_main.html
$tpl = new Template("templates/skin_main.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();