<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Explorateur de fichiers</title>
		<link href="style.css" rel="stylesheet">
	</head>

	<body>
		<h2>Explorateur</h2>

		<ul>
		<?php
			$url = "http://localhost/Explorateur-de-fichiers/";
			$slash = "\\"; 
			$acces = realpath("exploration.php"); 
			$acces = str_replace("exploration.php", "", $acces); 
			$accesDeBase = $acces; 
	
			if(isset($_GET['acces']) && !empty($_GET["acces"])) { 
				$acces = $acces.$_GET['acces'].$slash; 
				$acces = str_replace($slash.$slash, $slash, $acces); 
			}
			if(strpos($acces, "..") != false) {
				echo $acces."<br>";  
				die ("Accès Interdit !");
			}
			$accesAEnvoyer = str_replace($accesDeBase, "", $acces); 
	
			if(is_dir($acces)) {
				$dir = scandir($acces);
			}
			else {
				die("Erreur : T'as pas le droit !");
			} 
			foreach ($dir as $key => $fichs) : 
			if($fichs != "." && $fichs != ".." && $fichs != "exploration.php") { 
				if(is_dir($acces.$fichs)) { 
					echo "Dossier : <a href='".$url."?acces=".$accesAEnvoyer.$fichs."'>".$fichs."	</a><br>"; 
				}

			else if(is_file($acces.$fichs)) { 
				echo "Fichier : <a target='_blank' href='".$url.$slash.$accesAEnvoyer.$fichs."'>".$fichs."	</a><br>";
			}
			else {
				echo "Type inconnu <br>";
			}
	
		}
	endforeach;
				
	?>
		</ul>
	</body>
</html>