<?php
require_once('connect.php');
extract($_GET);
$totalCount = $conn->query("SELECT * FROM `users` ")->num_rows;
$search_where = "";
if(!empty($search)){
    $search_where = " where ";
    $search_where .= " name LIKE '%{$search['value']}%' ";
    $search_where .= " OR email LIKE '%{$search['value']}%' ";
}
$columns_arr = array("id","name","email");
$query = "SELECT * FROM `users` {$search_where}";
if(isset($order[0]['dir']))
{
	$query .= " ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']}";
}
else
{
	$query .= " ORDER BY id DESC";
}
if($length != -1)
{
	$query .= ' LIMIT ' . $start . ', ' . $length;
}
$query = $conn->query($query);
$recordsFilterCount = $conn->query("SELECT * FROM `users` {$search_where} ")->num_rows;



$recordsTotal= $totalCount;
$recordsFiltered= $recordsFilterCount;
$data = array();
while($row = $query->fetch_assoc()){
	$sub_array = array();
	$sub_array[] = $row['name'];
	$sub_array[] = $row['email'];
	$sub_array[] = '<button type="button" data-id="'.$row["id"].'" class="btn btn-warning btn-sm btn-edit">Edit</button>&nbsp;<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="'.$row["id"].'">Delete</button>';
	$data[] = $sub_array;
}

echo json_encode(array('draw'=>$draw,'recordsTotal'=>$recordsTotal,'recordsFiltered'=>$recordsFiltered,'data'=>$data));

?>
