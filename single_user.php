<?php
require_once('connect.php');

$id = $_POST['id'];

$result = $conn->query("SELECT * FROM `users` where id = '{$id}'");
if($result){
    $resp['status'] = 'success';
    $resp['data'] = $result->fetch_assoc();
}else{
    $resp['status'] = 'success';
    $resp['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);

?>
