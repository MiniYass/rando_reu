<?php
$dbHost="localhost";
$dbuser="root";
$dbpwd="";
$dbname="rando_reunion";


    try{
        $dns="mysql:host=".$dbHost.";dbname=".$dbname.";charset=utf8";
        $pdo= new PDO($dns,$dbuser,$dbpwd);
        $table=$pdo->query("SELECT * FROM hiking");
        
    }catch(PDOExeption $e){
        echo "DB connexion ratey";
    }
?>  

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
   
    <table>
       <tr>
        <td>Nom</td>
        <td>Difficulté</td>
        <td>Distance</td>
        <td>Durée</td>
        <td>Hauteur</td>
       </tr>
       <form method='GET' action='update.php'>
       <?php 
       foreach ($table as $row) {
    
        $id=$row['id'];
        
        echo"
        <td>".$row["name"]."</td>
        <td>".$row["difficulty"]."</td>
        <td>".$row["distance"]."</td>
        <td>".$row["duration"]."</td>
        <td>".$row["height_difference"]."</td>
        <td><a href='update.php?id=$id'>Modifier</a></td>
       </tr>";
    }
    
       ?>
       </form>
    </table>
  </body>
</html>