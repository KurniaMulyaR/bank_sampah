<?php 
include 'db.php'; 

function t_nasabah($data){
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$noktp = htmlspecialchars($data["noktp"]);
	$rek = htmlspecialchars($data["rek"]);
	$username = htmlspecialchars($data["username"]);
	$email = htmlspecialchars($data["email"]);
	$tmpt = htmlspecialchars($data["tmpt"]);
	$tgll = htmlspecialchars($data["tgll"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$pass = mysqli_real_escape_string($conn, $data["pass"]);
	$pass1 = mysqli_real_escape_string($conn, $data["pass1"]);
	$nohp = htmlspecialchars($data["nohp"]);
	$bergabung = htmlspecialchars($data["bergabung"]);
	$saldo	= htmlspecialchars($data["saldo"]);
	$level = htmlspecialchars($data["level"]);

	$norek = (int) substr($rek, 3, 3);
        $norek++;
	// Pengecekan Username yang sama
	$result = mysqli_query($conn, "SELECT username FROM nasabah WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('username sudah tersedia!');
		</script>";

		return false;
	}

	// Pengecekan password
		if ($pass !== $pass1) {
		echo "<script>
			alert('konfirmasi password tidak sesuai!');
			</script>";

		return false;
		}

	// tambahkan ke database 	
		mysqli_query($conn, "INSERT INTO nasabah VALUES ('','$nama','$rek','$noktp','$username','$email','$tmpt','$tgll','$alamat','$pass','$nohp','$bergabung','$saldo','$level')")or die(mysqli_error($conn));
		return mysqli_affected_rows($conn);
}

function e_ad_nasabah($data){
	global $conn;
	$id_nasabah = ($data["id_nasabah"]);
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$email = htmlspecialchars($data["email"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$nohp = htmlspecialchars($data["nohp"]);

	$query = "UPDATE nasabah SET nama = '$nama', username = '$username', email = '$email', alamat = '$alamat', nohp = '$nohp' WHERE id_nasabah = $id_nasabah";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function del_nasabah($id_nasabah){
	global $conn;
	mysqli_query($conn, "DELETE FROM nasabah WHERE id_nasabah = $id_nasabah");
	return mysqli_affected_rows($conn);
}
function search_nasabah($keyword) {
	$query = "SELECT * FROM nasabah
			WHERE 
			nama LIKE '%$keyword%' OR 
			rek LIKE '%keyword%'";
	return query($query);
}

?>







