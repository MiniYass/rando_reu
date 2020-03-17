<?php  
	$id=$_GET['id'];
	
	var_dump($id);
	
	$dbHost="localhost";
	$dbuser="root";
	$dbpwd="";
	$dbname="rando_reunion";

try{
        $dns="mysql:host=".$dbHost.";dbname=".$dbname.";charset=utf8";
        $pdo= new PDO($dns,$dbuser,$dbpwd);
		$table=$pdo->query("SELECT * FROM hiking WHERE id=$id");
		foreach ($table as $row) {
			$id=$row['id'];
			$nom=$row["name"];
			$diff=$row["difficulty"];
			$dis=$row["distance"];
			$dur=$row["duration"];
			$heightD=$row["height_difference"];
		}
		if(isset($_POST['button'])){
			
			$name=$_POST['name'];
			$difficulty=$_POST['difficulty'];
			$distance=$_POST['distance'];
			$duration=$_POST['duration'];
			$height_difference=$_POST['height_difference'];

			$id=$_GET['id'];
			
			$dns="mysql:host=".$dbHost.";dbname=".$dbname.";charset=utf8";
			$pdo= new PDO($dns,$dbuser,$dbpwd);

			$sql="UPDATE hiking SET name=:name,
					difficulty=:difficulty,
					distance=:distance,
					duration=:duration,
					height_difference=:height_difference,
					 WHERE id=:id";
					
			$pdoResult= $pdo->prepare($sql);

			$pdoExec= $pdoResult-> execute ([":name"=>$name,":difficulty"=>$difficulty,
			":distance"=>$distance,":duration"=>$duration,
			":height_difference"=>$height_difference,":id"=>$id]);
		
				 if($pdoExec){
					echo "<script>alert('donnée bien modifier !');</script>";
				 }else{
					echo "<script>alert('donnée non modifier !');</script>";
				 }
		}
	
}catch(PDOExeption $e){
        echo "DB connexion echoué";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Update</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $nom; ?>">
		</div>
		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value=""><?php echo $diff; ?></option>
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $dis; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $dur; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $heightD; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php 
	
	?>
</body>
</html>