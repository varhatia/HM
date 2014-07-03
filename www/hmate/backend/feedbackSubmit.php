<?php
// connect to the database
echo("<p>You didn't select any buildings.</p>\n");
$config_array = parse_ini_file("../config/config.ini");
$host=$config_array['host'];
$dbusername=$config_array['username'];
$dbpassword=$config_array['password'];
$db_name=$config_array['db'];
session_start();

$link = mysql_connect("$host", "$dbusername", "$dbpassword");
if (!$link)
{
	die('Could not connect: ' . mysqli_error($link));
}

mysql_select_db("$db_name")or die("cannot select DB ".mysql_error($link));
echo("<p>Connection Successful</p>");

if (isset($_POST['formSubmit'])) 
{
	
$questAValue = $_POST['radios-A'];
if($questAValue =='Yes')
{
	$questA = 1;
}
else
{
	$questA = 0;
}

$questB = $_POST['textarea-B'];
$questCValue = $_POST['radios-C'];
if($questCValue =='Yes')
{
	$questC = 1;
}
else
{
	$questC = 0;
}

$questD = $_POST['textarea-D'];


function IsChecked($chkname,$value)
{
	if(!empty($_POST[$chkname]))
	{
		foreach($_POST[$chkname] as $chkval)
		{
			if($chkval == $value)
			{
				return true;
			}
		}
	}
	return false;
}

$questE = " ";

if(IsChecked('checkbox', 'A'))
{
$questE .= "A,";
}
if(IsChecked('checkbox', 'B'))
{
	$questE .= "B,";
}
if(IsChecked('checkbox', 'C'))
{
	$questE .= "C,";
}

$questF = $_POST['textarea-F'];

$sql="INSERT INTO feedback (questA, questB, questC, questD, questE, questF) VALUES ($questA,'$questB',$questC,'$questD','$questE','$questF')";

mysql_query($sql) or trigger_error("Insert failed: " . mysql_error());
header("location:../frontend/thankForFeedback.php");
}
else
{
	echo("<p>You didn't select any buildings.</p>\n");
}

mysql_close($link);
?>



