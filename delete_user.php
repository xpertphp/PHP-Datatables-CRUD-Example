<?php
require_once('connect.php');

$id = $_POST['id'];

$result = $conn->query("delete FROM `users` where id = '{$id}'");
if($result){
    $resp['status'] = 'success';
}else{
    $resp['status'] = 'success';
    $resp['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);

?>
