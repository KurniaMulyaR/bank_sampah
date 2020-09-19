<?php 
include 'db.php';


function t_laporan($data){
	global $conn;
	$nama 		= htmlspecialchars($data["nama"]);
	$rek 		= htmlspecialchars($data["rek"]);
	$alamat 	= htmlspecialchars($data["alamat"]);
	$jns_smph 	= htmlspecialchars($data["jns_smph"]);
	$brt_smph 	= htmlspecialchars($data["brt_smph"]);
	$hrg_smph 	= htmlspecialchars($data["hrg_smph"]);
	$debit		= htmlspecialchars($data["debit"]);
	$petugas	= htmlspecialchars($data["petugas"]);

// tambahkan ke database 	
		mysqli_query($conn, "INSERT INTO laporan_bank_sampah VALUES ('','','$nama','$rek','$alamat','$jns_smph','$brt_smph','$hrg_smph','$debit','$petugas')");
		return mysqli_affected_rows($conn);
}
function c_laporan($data){
	global $conn;
$id= $_POST['rek'];
$query=mysqli_query($conn,"SELECT * FROM nasabah WHERE rek='$id'");
$r=mysqli_fetch_array($query);
$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nasabah WHERE rek='$_POST[rek]'"));
}
function del_laporan($id_laporan_bank){
	global $conn;
	mysqli_query($conn, "DELETE FROM laporan_bank_sampah WHERE id_laporan_bank = $id_laporan_bank");
	return mysqli_affected_rows($conn);
}

function e_laporan($data){
	global $conn;
	$id_laporan_bank = htmlspecialchars($data["id_laporan_bank"]);
	$nama 			 = htmlspecialchars($data["nama"]);
	$rek 			 = htmlspecialchars($data["rek"]);
	$alamat 		 = htmlspecialchars($data["alamat"]);
	$jns_smph 		 = htmlspecialchars($data["jns_smph"]);
	$brt_smph 		 = htmlspecialchars($data["brt_smph"]);
	$hrg_smph 		 = htmlspecialchars($data["hrg_smph"]);
	$debit			 = htmlspecialchars($data["debit"]);


	$query = "UPDATE laporan_bank_sampah SET  nama = '$nama', rek =  '$rek',  alamat = '$alamat', jns_smph = '$jns_smph', brt_smph = '$brt_smph', hrg_smph = '$hrg_smph', debit =  '$debit'WHERE id_laporan_bank = $id_laporan_bank" ;

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function cari($keyword) {
	$query = "SELECT * FROM nasabah
			WHERE 
			nama LIKE '%$keyword%' OR 
			rek LIKE '%keyword%'";

	return query($query);
}
 ?>