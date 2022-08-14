<?php
    require_once('connect.php');

    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name,email) VALUES ('$name','$email')";
    $result = $conn->query($sql);
	
	if($result){
    $resp['status'] = 'success';
	}else{
		$resp['status'] = 'failed';
		$resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
	}
    echo json_encode($resp);
    
?>