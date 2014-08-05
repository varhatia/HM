<?php
include_once '../backend/common/dbConnect.php';
include_once '../backend/common/shared.php';

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysqli_query($connecDB,"SELECT id,name,message FROM paginate ORDER BY id DESC LIMIT $position, $item_per_page");

//output results from database
echo '<ul class="page_result">';
while($row = mysqli_fetch_array($results))
{
	echo '<li id="item_'.$row["id"].'"><span class="page_name">'.$row["id"].') '.$row["name"].'</span><span class="page_message">'.$row["message"].'</span></li>';
}
echo '</ul>';
?>

