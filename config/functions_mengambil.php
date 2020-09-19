<?php 
include 'db.php'; 


function mengambil($data){
	global $conn;
	$id_nasabah = htmlspecialchars($data["id_nasabah"]);
	$nama = htmlspecialchars($data["nama"]);
	$rek = htmlspecialchars($data["rek"]);
	$tgl_permintaan = htmlspecialchars($data["tgl_permintaan"]);
	$status = htmlspecialchars($data["status"]);
	$jumlah = mysqli_real_escape_string($conn, $data["jumlah"]);
	$saldo = htmlspecialchars($data["saldo"]);
	$max = Max($saldo, false);

	$query_saldo = mysqli_query($conn,"SELECT SUM(jumlah) as jumlah_jumlah FROM mengambil WHERE id_nasabah = '$id_nasabah'");
	$saldoo = mysqli_fetch_array($query_saldo);
	$saldo_debit = $saldoo['jumlah_jumlah'];

	if ($jumlah > $saldo) {
      echo "<script>
			alert('saldo anda tidak mencukupi!');
		</script>";
		return false;
        }

	if ($saldo_debit >= $saldo) {
		echo "<script>
			alert('jumlah anda tidak mencukupi!');
		</script>";
		return false;
	}

	if ($jumlah < 5000) {
		echo "<script>
			alert('jumlah yang anda masukan tidak sesuai!');
		</script>";
		return false;
	}

	// tambahkan ke database 	
		mysqli_query($conn, "INSERT INTO mengambil VALUES ('','$id_nasabah','$nama','$rek','$jumlah','$tgl_permintaan','$status','','$saldo')")or die(mysqli_error($conn));

		return mysqli_affected_rows($conn);
}
function his_mengambil($data){
	global $conn;
	$id_nasabah = htmlspecialchars($data["id_nasabah"]);
	$nama = htmlspecialchars($data["nama"]);
	$rek = htmlspecialchars($data["rek"]);
	$tgl_permintaan = htmlspecialchars($data["tgl_permintaan"]);
	$status = htmlspecialchars($data["status"]);
	$jumlah = mysqli_real_escape_string($conn, $data["jumlah"]);
	$saldo = htmlspecialchars($data["saldo"]);

        if ($saldo < $jumlah) {
           echo "<script>
				alert('saldo anda tidak mencukupi!');
			</script>";

			return false;
         }

	// tambahkan ke database 	
		mysqli_query($conn, "INSERT INTO his_mengambil VALUES ('','$id_nasabah','$nama','$rek','$jumlah','$tgl_permintaan','$status','','$saldo')")or die(mysqli_error($conn));

		return mysqli_affected_rows($conn);
}

function e_mengambil($data){
	global $conn;
	$id_mengambil = ($data["id_mengambil"]);
	$status = htmlspecialchars($data["status"]);
	$tgl_konfirmasi = htmlspecialchars($data["tgl_konfirmasi"]);

	mysqli_query($conn, "UPDATE mengambil SET status = '$status', tgl_konfirmasi = '$tgl_konfirmasi' WHERE id_mengambil = $id_mengambil")or die(mysqli_error($conn));

	return mysqli_affected_rows($conn);
}
function del_mengambil($id_mengambil){
	global $conn;
	mysqli_query($conn, "DELETE FROM mengambil WHERE id_mengambil = $id_mengambil")or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}
function search_ngambil($keyword) {
	$query = "SELECT * FROM mengambil
			WHERE 
			nama LIKE '%$keyword%' OR 
			status LIKE '%keyword%'";
	return query($query);
}
function t_nabung($data){
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$rek = htmlspecialchars($data["rek"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tglmenabung = htmlspecialchars($data["tglmenabung"]);
	$jns_smph = htmlspecialchars($data["jns_smph"]);
	$brt_smph = htmlspecialchars($data["brt_smph"]);
	$hrg_smph = htmlspecialchars($data["hrg_smph"]);
	$debit = htmlspecialchars($data["debit"]);
	

	// tambahkan ke database 	
		mysqli_query($conn, "INSERT INTO menabung VALUES ('','','$tglmenabung','$jns_smph','$brt_smph','$hrg_smph','$debit')")or die (mysqli_error($conn));

		return mysqli_affected_rows($conn);
}
function t_mengambil($data){
	global $conn;
	$id_mengambil = ($data["id_mengambil"]);
	$id_nasabah = ($data["id_nasabah"]);
	$debit = ($data["debit"]);
	$kredit = ($data["kredit"]);
	$petugas = htmlspecialchars($data["petugas"]);
	$tgl_permintaan = htmlspecialchars($data["tgl_permintaan"]);
	$tgl_konfirmasi = htmlspecialchars($data["tgl_konfirmasi"]);

	mysqli_query($conn,"INSERT INTO laporan_bank_sampah VALUES('','$id_nasabah','$id_mengambil','','','','$debit','$kredit','$petugas','','','$tgl_permintaan','$tgl_konfirmasi')") or die(mysqli_error($conn));

       $query_saldo = mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM laporan_bank_sampah WHERE id_nasabah = '$_POST[id_nasabah]'");
      $saldo = mysqli_fetch_array($query_saldo);
      $saldoo = $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
      mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo' WHERE id_nasabah = '$_POST[id_nasabah]'");
      
	return mysqli_affected_rows($conn);
}
?>







