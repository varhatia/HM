<?php

	//Get the top 10 recent User & there hobbies
	$con = mysqli_connect('localhost','root','root');
	if (!$con)
	{
		die('Could not connect: ' . mysqli_error($con));
	}
	
	mysqli_select_db($con,"hbmt");
	$sql="SELECT * FROM hobbydetails WHERE share='1' LIMIT 5";
	$result = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result))
	{
		$username = $row['username'];
		$hobby = $row['hobbyname']; 
		echo "<div class=\"row-fluid\">";
		echo"<ul>";
		echo"<li class=\"span12\"> <p style=\"float: left; \">";
		echo "<img src=\"img/placeholder-260x150.jpg\">";
		echo "<p>. $username. </p>";
		echo "<p>. $hobby. </p></p>";
		echo "</li>";
		echo "</ul>";
		echo "</div>";
//		echo "<div id=\"connect\"><i class=\"icon-thumbs-up\"></i>
	//	<input type=\"button\" name=\"connect\" id=\"addbtn\" value=\"CONNECT!!!\">
		//</div>";
		echo "<div class=\"row-fluid\">";
		echo"<ul><li class=\"span12\">";
		echo "<i class=\"icon-plus-sign\"></i>";
		echo "<input type=\"button\" name=\"connect\" id=\"addbtn\" value=\"CONNECT!!!\">";
		echo "</li></ul>";
		echo "</div>";
		echo "<br></br>";
	}

	mysqli_close($con);
	
?>