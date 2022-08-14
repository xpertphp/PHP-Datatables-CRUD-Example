<?php
    require_once('connect.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $sql = "UPDATE `users` set `name` = '{$name}', `email` = '{$email}' where id = '{$id}'";
    $result = $conn->query($sql);
	
	if($result){
    $resp['status'] = 'success';
	}else{
		$resp['status'] = 'failed';
		$resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
	}
    echo json_encode($resp);
    
?>