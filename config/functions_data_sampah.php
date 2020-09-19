<?php 
include 'db.php'; 

function e_dt_smph($data){
	global $conn;
	$id_data_smph = ($data["id_data_smph"]);
	$jns_smph = htmlspecialchars($data["jns_smph"]);
	$satuan = htmlspecialchars($data["satuan"]);
	$hrg_smph = htmlspecialchars($data["hrg_smph"]);

	$query = "UPDATE data_sampah SET jns_smph = '$jns_smph', satuan = '$satuan', hrg_smph = '$hrg_smph' WHERE id_data_smph = $id_data_smph";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function del_dt_smph($id_nasabah){
	global $conn;
	mysqli_query($conn, "DELETE FROM data_sampah WHERE id_data_smph = $id_data_smph");
	return mysqli_affected_rows($conn);
}
function search_dt_smph($kata) {
	$query = "SELECT * FROM data_sampah
			WHERE 
			jns_smph LIKE '%$kata%'";
	return query($query);
}
?>