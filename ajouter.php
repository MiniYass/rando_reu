<?php

$dbHost="localhost";
$dbuser="root";
$dbpwd="";
$dbname="rando_reunion";
    try{
        $dns="mysql:host=".$dbHost.";dbname=".$dbname.";charset=utf8";
        $pdo= new PDO($dns,$dbuser,$dbpwd);
        $table=$pdo->query("SELECT * FROM hiking");

        if(isset($_POST['button'])){

        $table = $pdo->prepare("INSERT INTO hiking ( name,difficulty,duration,height_difference,distance) VALUES (?,?,?,?,?)");
        $table->bindParam(1, $name);
        $table->bindParam(2, $difficulty);
        $table->bindParam(3, $duration);
        $table->bindParam(4, $height_difference);
        $table->bindParam(5,$distance)

        $name= $_POST['name'];
        $difficulty= $_POST['difficulty'];
        $duration= $_POST['duration'];
        $height_difference= $_POST['height_difference'];
        $distance= $_POST['distance'];
        
        $table->execute();
        echo "<script>alert('donnée bien envoyé !');</script>";
    }
    }catch(PDOExeption $e){
        echo "DB connexion ratey";
    }




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>
		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>