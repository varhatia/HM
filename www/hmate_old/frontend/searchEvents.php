<?php
include_once 'common/header.php';
session_start();

// connect to the database

$config_array = parse_ini_file("../config/config.ini");
$host=$config_array['host'];
$dbusername=$config_array['username'];
$dbpassword=$config_array['password'];
$db_name=$config_array['db'];
session_start();

$link = mysqli_connect("$host", "$dbusername", "$dbpassword","$db_name");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$organization = $_POST['organization'];
$orgLocation = $_POST['orgLocation'];
$aptName = $_POST['aptName'];
$resArea = $_POST['resArea'];

$selectQuery = "SELECT * 
FROM  `events` where";

if(empty($organization))
{
	$selectQuery .= " organization IS NOT NULL";
}
else
{
	$selectQuery .= " organization = '$organization'";
}

if(empty($orgLocation))
{
	$selectQuery .= " AND orgLocation IS NOT NULL";
}
else
{
	$selectQuery .= " AND orgLocation = '$orgLocation'";
}

if(empty($aptName))
{
	$selectQuery .= " AND aptName IS NOT NULL";
}
else
{
	$selectQuery .= " AND aptName = '$aptName'";
}

if(empty($resArea))
{
	$selectQuery .= " AND resArea IS NOT NULL";
}
else
{
	$selectQuery .= " AND resArea = '$resArea'";
}

$selectQuery .= " ORDER BY  `datetime` ASC 
LIMIT 15; ";
//echo '<pre>';print_r($selectQuery);echo '</pre>';
$result = mysqli_query($link,$selectQuery);
?>

<div class="content">
<div class="container">
<div class="row">
		
		<div class="tabbable tabs-left">

			<ul class="nav nav-tabs" id="customtabs">
				<li><a href="cycling.php#egang"><strong>Expand Your Gang</strong> </a>
				</li>
				<li><a href="cycling.php#pactivity"><strong>Schedule
							an activity</strong> </a></li>
				<li><a href="cycling.php#sactivity"><strong>Search
							for upcoming activity</strong> </a></li>
			</ul>

		</div>

		<div class="col-md-9">
			<div class="page-header">
				<h1>HobbyMate Events</h1>
			</div>
		

<?php 
	

while($row = mysqli_fetch_array($result))
{
	$date = date_create($row['datetime']);
	$tempDate = date_format($date, 'jS M');
	$event = $row['id'];
	$eventName = $row['eventName'];
	$desc = $row['sdesc'];
	
        echo "<div class=\"row bottom-space\">
            	<div class=\"col-md-1\">
                	<div class=\"circle\">
	         	<span class=\"event-date\">$tempDate

				</span>
                </div>
            </div>
            <div class=\"col-md-6 col-lg-offset-1\">
                	<h4>

					<a href=\"events.php?id=$event\">$eventName</a>

				</h4>
                <p>$desc</p>
            </div>
        </div>";
}
		
mysql_close($link);

?>
</div>
</div>
</div>
</div>

<?php
include_once 'common/footer.php';

?>
