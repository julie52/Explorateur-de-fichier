<?php	
	$slash = '\\';
	$direction = realpath("exploration.php");
	$direction = str_replace("\exploration.php", "", $direction);
	$ouvre = opendir($direction);
	$fichier = scandir($direction);
	echo $direction;

	foreach ($fichier as $fich) {
		if ($fich != '.' && $fich != '..') {
		
			
		}
	}

/*--------------------------------------------------------------------*/

	function scan($dir) {
    /*On regarde déjà si le dossier existe*/
    if(is_dir($dir)) {
        /*On le scan et on récupère dans un tableau le nom des fichiers et des dossiers*/
        $files = scandir($dir);
 
        /*On supprime . et .. qui sont respectivement le dossier courant et le dossier précédent*/
        unset($files[0], $files[1]);
 
        /*On tri le tableau de façon intelligente (à la façon humaine)
        http://www.php.net/function.natcasesort*/
        natcasesort($files);
 
        /*On commence par afficher les dossiers*/
        foreach($files as $f) {
            // S'il y a un dossier
            if(is_dir($dir.$f)) {
                /*On affiche alors les données*/
                echo '<li class="folder">'.$f.'</li>';
                echo '<ul class="tree">';
 
                /*Et du coup comme c'est un dossier, un le rescan*/
                scan($dir.$f."/");
 
                echo '</ul>';
            }
        }
 
        /*Puis on affiche les fichiers*/
        foreach($files as $f) {
            /*S'il y a un fichier*/
            if(is_file($dir.$f)) {
                echo '<li class="file" rel="'.$dir.$f.'">'.$f.'</li>';
            }
        }
    }
}

/*--------------------------------------------------------------------*/

$dir = "./";
/*si le dossier pointe existe*/
if (is_dir($dir)) {

   /*si il contient quelque chose*/
   if ($dh = opendir($dir)) {

       /*boucler tant que quelque chose est trouve*/
       while (($file = readdir($dh)) !== false) {

           /*affiche le nom et le type si ce n'est pas un element du systeme*/
           if( $file != '.' && $file != '..') {
           echo "fichier : $file : type : " . filetype($dir . $file) . "<br />\n";
           }
       }
       /*on ferme la connection*/
       closedir($dh);
   }
}
/*--------------------------------------------------------------------*/
    
    print_r($fichiers);
    $fichiers = scandir("C:\Users\Stagiaire\Desktop\PROJETS");


    function scanner($dir) {
        if (is_dir($dir)) {
            $fichiers = scandir($dir);
            unset($fichiers[0], $fichiers[1]);/*cache le dossier '.' & '..'*/
            natcasesort($fichiers);/*tri le tableau à la façon "humaine"*/

        foreach ($fichiers as $fichs) {
            if (is_dir($dir.$fichs)) {
                echo '<li class="dossiers">'.$fichs.'</li>';
                echo '<ul class="arbre">';

        scan($dir.$fichs."/");
        echo '</ul>';
    }
    }

        foreach ($fichiers as $fichs) {
            if(is_file($dir.$fichs)){
                echo '<li class="fichier" rel="'.$dir.$fichs.'">'.$fichs.'</li>';
        }
        }
    }
    }   
    scanner("C:\Users\Stagiaire\Desktop\PROJETS");
/*------------------------------------------------------------------*/
?>