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
$hobby = "CYCLING";


$selectQuery = "SELECT t1.uid, t1.organization,  t1.orgLocation, t1.aptName,  t1.resArea,  t2.userimage,  t2.username, t2.useremail, t3.hobbyname 
FROM  `userdetail` t1
INNER JOIN fb_login t2 ON t1.uid = t2.uid
INNER JOIN userhobbydetail t3 ON t2.uid = t3.uid where";

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

if(empty($hobby))
{
	$selectQuery .= " AND hobbyname IS NOT NULL";
}
else
{
	$selectQuery .= " AND hobbyname = '$hobby'";
}

$selectQuery .= ";";
//echo '<pre>';print_r($selectQuery);echo '</pre>';
$result = mysqli_query($link,$selectQuery);

$count=mysqli_num_rows($result);
//echo '<pre>';print_r($count);echo '</pre>';

?>
<script type="text/javascript" src="js/user.js">
</script>

<script>

function UpdateRecord(id)
{
	alert(id);
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("responsecontainer").innerHTML=xmlhttp.responseText;
		}	
	}
	xmlhttp.open("GET","friendRequest.php?q="+id,true);
	xmlhttp.send();
	   
}

//This function is written keeping future in mind. We may need to invoke more than 1 function so this is required.
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
	window.onload = func;
  } else {
//	window.onload = function() {
//	  if (oldonload) {
		oldonload();
//		  }
	  func();
	//}
  }
}
addLoadEvent(function() {
})


</script>



<?php //  
echo '<pre>';print_r($selectQuery);echo '</pre>';

echo "<br><br> <div class=\"container\">
 <div class=\"well col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2\">";


while($row = mysqli_fetch_array($result))
{
	$image = $row['userimage'];
	$userId = $row['uid'];
	$userName = $row['username'];
	$useremail = $row['useremail'];
	$organization = $row['organization'];
	$orgLocation = $row['orgLocation'];
	$resArea = $row['resArea'];
	$aptName = $row['aptName'];
	
echo "        <div class=\"row user-row\">
            <div class=\"col-xs-3 col-sm-2 col-md-1 col-lg-1\">
                <img class=\"img-circle\"
                     src=\"https://localhost/frontend/". $image ."?sz=50\" 
                     alt=\"User Pic\">
            </div>
            <div class=\"col-xs-8 col-sm-9 col-md-10 col-lg-10\">
                <strong>$userName</strong><br> 
            </div>
            <div class=\"col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user\" data-for=\".$userId\"> 
                <i class=\"glyphicon glyphicon-chevron-down text-muted\"></i>
            </div>
        </div>
        <div class=\"row user-infos $userId\">
            <div class=\"col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1\">
                <div class=\"panel panel-primary\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">User information</h3>
                    </div>
                    <div class=\"panel-body\">
                        <div class=\"row\">
                            <div class=\"col-md-3 col-lg-3 hidden-xs hidden-sm\">
                                <img class=\"img-circle\"
                                     src=\"https://localhost/frontend/". $image ."?sz=100\" 
                                     alt=\"User Pic\">
                            </div>
                            <div class=\"col-xs-2 col-sm-2 hidden-md hidden-lg\">
                                <img class=\"img-circle\"
                                     src=\"https://localhost/frontend/". $image ."?sz=50\"
                                     alt=\"User Pic\">
                            </div>
                            <div class=\"col-xs-10 col-sm-10 hidden-md hidden-lg\">
                                <strong>$userName</strong><br>";
	//Query other hobbies of users
 	$selectQuery = "SELECT hobbyname from userhobbydetail where uid = '$userId'"; 
	//echo '<pre>';print_r($selectQuery);echo '</pre>';
	$resultHobby = mysqli_query($link,$selectQuery);
	$hobbies = '';
	while($row = mysqli_fetch_array($resultHobby))
	{
		$hobbies .= "\"".$row['hobbyname']."\" ";
		
		
	}
	
 	echo "<dl>
				<dt>Organization</dt>
                                    <dd>$organization</dd>
                                    <dt>Location</dt>
                                    <dd>$orgLocation</dd>
                                    <dt>Residence Area</dt>
                                    <dd>$resArea</dd>
                                    <dt>Apt Name</dt>
                                    <dd>$aptName</dd>
                                    <dt>Interests</dt>
                                    <dd>$hobbies</dd>
                                </dl>
                            </div>
                            <div class=\" col-md-9 col-lg-9 hidden-xs hidden-sm\">
                                <strong>$userName</strong><br>
		                        <table class=\"table table-user-information\">
                                    <tbody>
									 <tr> 
                                         <td>Organization</td> 
                                         <td>$organization</td> 
                                     </tr> 
                                     <tr> 
                                         <td>Location</td> 
                                         <td>$orgLocation</td> 
                                     </tr> 
                                     <tr> 
                                         <td>Residential Area</td> 
                                         <td>$resArea</td> 
                                     </tr> 
            		                 <tr> 
                                         <td>Apt Name</td> 
                                         <td>$aptName</td> 
                                     </tr> 
            						 <tr> 
                                         <td>Interests</td> 
                                         <td>$hobbies</td> 
                                     </tr> 
                     		         </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class=\"panel-footer\">
                        <button class=\"btn btn-sm btn-primary\" type=\"button\"
                                onClick=\"UpdateRecord($userId)\" data-toggle=\"tooltip\"
                                data-original-title=\"Add to your network\"><i class=\"glyphicon glyphicon-plus\"></i></button>
                        <span class=\"pull-right\">
                            <!--button class=\"btn btn-sm btn-warning\" type=\"button\"
                                    data-toggle=\"tooltip\"
                                    data-original-title=\"Edit this user\"><i class=\"glyphicon glyphicon-edit\"></i></button-->
                            <button class=\"btn btn-sm btn-danger\" type=\"button\"
                                    data-toggle=\"modal\" data-original-title=\"Add to your network\"
                                    data-target=\"#myModal\"><i class=\"glyphicon glyphicon-envelope\"></i></button>
			<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
					<div class=\"modal-dialog\">
						<div class=\"modal-content\">
							<div class=\"modal-header\">
								<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
								<h4 class=\"modal-title\" id=\"myModalLabel\">Compose Message</h4>
							</div>
							<div class=\"modal-body\">
								<form role=\"form\" class=\"form-horizontal\">
									<div class=\"form-group\">
										<label class=\"col-sm-2\" for=\"inputTo\">To</label>
										<div class=\"col-sm-10\">
											<input type=\"email\" class=\"form-control\" id=\"inputTo\"
												placeholder=$useremail>
										</div>
									</div>
									<div class=\"form-group\">
										<label class=\"col-sm-2\" for=\"inputSubject\">Subject</label>
										<div class=\"col-sm-10\">
											<input type=\"text\" class=\"form-control\" id=\"inputSubject\"
												placeholder=\"subject\">
										</div>
									</div>
									<div class=\"form-group\">
										<label class=\"col-sm-12\" for=\"inputBody\">Message</label>
										<div class=\"col-sm-12\">
											<textarea class=\"form-control\" id=\"inputBody\" rows=\"18\"></textarea>
										</div>
									</div>
								</form>
							</div>
							<div class=\"modal-footer\">
								<button type=\"button\" class=\"btn btn-default pull-left\"
									data-dismiss=\"modal\">Cancel</button>
								<button type=\"button\" class=\"btn btn-warning pull-left\">Save
									Draft</button>
								<button type=\"button\" class=\"btn btn-primary \">
									Send <i class=\"fa fa-arrow-circle-right fa-lg\"></i>
								</button>

							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal compose message -->
 	                                    
                        </span>
                    </div>
                </div>
            </div>
        </div>";

} 


echo "  </div>
</div>";

mysql_close($link);

?>

<?php
include_once 'common/footer.php';

?>
