	<?php
	require_once 'app/init.php';
	$authUrl = $auth->checkToken();
	if($auth->login())
	{
		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		
	}

	?>

	<!doctype html>
	<html>
		<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<title>Jugadd</title>
		<link href='$template' rel='stylesheet' type='text/css' />
		<script src='models/funcs.js' type='text/javascript'>
		</script>
		</head>
			<body>
				<?php if($authUrl) 
			{header("Location: index.php");
			}
			else: ?>
			<div id='wrapper'>
			<div id='top'><div id='logo'></div></div>
			<div id='content'>
			<h1>UserCake</h1>
			<h2>2.00</h2>
			<div id='left-nav'>";
			<ul>
			<li><a herf='logout.php'>Logout</li>
			</ul>
			</div>
			<div id='main'>
			Hey,<br>
			google authentication successful
			
			</div>
			
			</div>
			<div id='bottom'></div>
			</div>
			
		</body>
<html>		
				