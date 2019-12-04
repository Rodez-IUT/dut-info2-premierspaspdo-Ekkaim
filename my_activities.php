<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>All users</title>
	  
		<link href="css/monStyle.css" rel="stylesheet">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	</head>
	<body>
		<?php
		spl_autoload_extensions(".php");
		spl_autoload_register();

		use yasmf\HttpHelper;
		?>
		<h2> ALL USERS </h1>
		<form method="get">
			<label>Start with letter : </label> 
			<input type="text" id="letter" name="letter" required maxlength="20" size="10">
			<label> and status is : </label> 	
			<select name="status">
				<option value="Active account" selected>Active account</option>
				<option value="Waiting for account validation">Waiting for account validation</option>
				<option value="Waiting for account deletion">Waiting for account deletion</option>
			</select>
			<input type="submit" value="OK">
		</form>
	</body>
</html>