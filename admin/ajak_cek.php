<?php 
include '../config/db.php';

if(isset($_POST['search'])){

	// Search value
    $search = $_POST['search'];

    // Explode by " " to get an Array
    $search_explode = explode(" ",$search);

    // Create condition
    $condition_arr = array();
    foreach($search_explode as $value){
    	$condition_arr[] = " nama like '%".$value."%'";
    }

    $condition = " ";
    if(count($condition_arr) > 0){
    	$condition = "WHERE".implode(" or ",$condition_arr);
    }
    
    // Select Query
    $query = "SELECT * FROM nasabah ".$condition;

    $result = mysqli_query($conn,$query); 
    while($row = mysqli_fetch_assoc($result) ){
        $response[] = array("value"=>$row['rek'],
                            "text"=>$row['alamat'],
                            "label"=>$row['nama']);
    }
    
    echo json_encode($response);
}

exit;