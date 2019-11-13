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
			$status='Active account';
			$lettre='e';
			
			$host='localhost';
			$db='my_activities';
			$user='root';
			$pass='root';
			$charset='utf8mb4';
			$dsn="mysql:host=$host;dbname=$db;charset=$charset";
			$options=[
				PDO::ATTR_ERRMODE				=>PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE	=>PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES		=>false,];
			try{
				$pdo=new PDO($dsn,$user,$pass,$options);
			}catch(PDOException$e){
				throw new PDOException($e->getMessage(),(int)$e->getCode());
			}
			$stmt = $pdo->query('SELECT users.id, users.username, users.email, status.name 
								FROM users 
								JOIN status 
								ON users.status_id=status.id 
								WHERE status.name="'.$status.'" 
								AND users.username LIKE "e%"
								ORDER BY username');
			echo "<div class=\"container\">";
				echo "<div class=\"row\">";
					echo "<div class=\"col-lg-1\"><strong> ID </strong></div>";
					echo "<div class=\"col-lg-3\"><strong> Username </strong></div>";
					echo "<div class=\"col-lg-5\"><strong> Email </strong></div>";
					echo "<div class=\"col-lg-3\"><strong> Status </strong></div>";
				echo "</div>";
				while($row = $stmt->fetch()){
					echo "<div class=\"row\">";
						echo "<div class=\"col-lg-1\">".$row['id']."</div>";
						echo "<div class=\"col-lg-3\">".$row['username']."</div>";
						echo "<div class=\"col-lg-5\">".$row['email']."</div>";
						echo "<div class=\"col-lg-3\">".$row['name']."</div>";
					echo "</div>";
				}
			echo "</div>";
		?>
	</body>
</html>