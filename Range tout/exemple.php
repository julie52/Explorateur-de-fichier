<?php

$slash = '\\'; //L'antislash sert à échapper les caractères comme les guillemets, pour stocker un antislash dans les variables, on en mets 2

$chemin = realpath("index.php"); //récupère le chemin réel du fichier
$chemin = str_replace("\index.php", "" , $chemin); //on enlève index.php du chemin pour avoir le chemin du dossier


$fichierAScanner = "exemple.jpg";

//Pour faire une action sur le fichier exemple.php, on utilisera ça pour avoir le chemin : 
$cheminDuFichier = $chemin.$slash.$fichierAScanner;

echo $cheminDuFichier;

?>