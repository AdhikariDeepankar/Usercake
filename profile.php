<?php
	
	require_once("models/config.php");
	if (!securePage($_SERVER['PHP_SELF'])){die();}
	require_once("models/header.php");
	
	

	$name = $_FILES['profilepicture']['name'];
		$type = $_FILES['profilepicture']['type'];
		$size = $_FILES['profilepicture']['size'];
		$tmp_name = $_FILES['profilepicture']['temp_name'];
		$extension = substr($name, strpos($name, '.') +1);
	
	
if(issset($name))
			{
				if(!empty($name))
				{

					if(($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png"))
					{
	
						if($size<2000000)
						{
							$location = 'images/';
							if(move_uploaded_file($tmp_name, $location.('$profileUsersData['username']'.'$profileUsersData['profileext'].');
							{
								$query = "UPDATE uc_users SET profilepictureextension='$extension' where id=$profileUsersData['id']]; 																			

								echo'<img src="$location.('$profileUsersData['username']'.'$profileUsersData['profileext'].'>
							}
							else
							{
					  		$errors[]=lang("UPLOAD_ERROR");
							}
						}
						else
						{
							$errors[]=lang("SIZE_TOO_BIG_2MB_LIMIT");
						}	
					}	
				}


			}
				
				
				echo "
				<body>
				<div id='wrapper'>
				<div id='top'><div id='logo'></div></div>
				<div id='content'>
				<h1>UserCake</h1>
				<h2>Account</h2>
				<div id='left-nav'>";

				include("left-nav.php");
				
				echo"
				</div>
				<div id ='main'>";
				
if($profileUserData['extension']=="n/a"  	
echo "<img src="images/profile.png" widht='200' height = '400'/>";

else
echo "<img src=images/userimages/'md5('$profileUsersData['username']'.'$profileUsersData['profileext'].'" width="200" height="200" />"; 			
	</br>
	echo"<h1>$loggedInUser->displayname</h1>"	
	</div>;
				
?>	
	<form action="account.php" method="post">
		<input type="file" name="profilepicture" /> <input type="submit' name="profilepicturesubmit" value="update">
	</from>