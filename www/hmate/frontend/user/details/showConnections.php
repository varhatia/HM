<?php

//Sanitize input data using PHP filter_var().
$uid = $_GET['id'];

$connectionsQuery = "SELECT * from `userfriend` where uid = 4";
//'<pre>';print_r($connectionsQuery);echo '</pre>';
$resultConn = mysql_query($connectionsQuery);
	
$connectionCount = mysql_num_rows($resultConn);

//'<pre>';print_r($connectionCount);echo '</pre>';
echo "
	<a href=\"#\" id=\"displayUser\" data-toggle=\"modal\"
   data-target=\"#displayConnectionsModal\"><p>".$connectionCount."</p></a>
";

?>




