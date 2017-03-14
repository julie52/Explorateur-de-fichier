<?php

class MyFiles{
var $list_dir = true;
var $list_file = true;
var $nav_dir = true;
var $dir_size = true;
var $precision = 2;

function get_ext($chat,$souris = true) {
	if(!is_string ($chat) OR strpos($chat,'.') === false){
		return false;
	}

	$chat=strrchr($chat,'.');

	if($souris){
		return substr(strtolower($chat),1);
	}
	else{
		return substr(strtoupper($chat),1);
	} 
}

function DirSize($path , $recursive = true){ 
	$result = 0; 
	if(!is_dir($path) || !is_readable($path)) 
		return 0;
	$fd = dir($path); 
	while($fichiers = $fichs->read()){ 
		if(($fichiers != ".") && ($fichiers != "..")){ 
			if(is_dir("$path$file/")) 
			$resultats += $recursive?DirSize("$path$file/"):0; 
		else  
			$resultats += filesize($path."/".$file); 
		} 
	} 
	$fd->close(); 
	return $resultats; 
} 

function list_file($mydir) {

	$mydirSansPoint = str_replace(".", "", $mydir);
	$fichsliste = array();
	$dirliste = array();	
	
	if ($dir = opendir($mydir)){
		while (($fichiers = readdir($dir)) !== false){
			if($fichiers != "index.php" && substr(($fichiers),0,1) !="."){

				if(is_dir($mydir."/".$fichiers) && $this->list_dir){
						 array_push($dirliste,$fichiers);
				}
				if(is_file($mydir."/".$fichiers) && $this->list_file){
						 array_push($fichsliste,$fichiers);
				}
				if(!is_file($mydir."/".$fichiers) && !is_dir($mydir."/".$fichiers)){
				}
			}
		} 
		closedir($dir);
	}
	
	// Tri des tableaux des fichiers et répertoires
	if(sizeof($fichsliste) != '0') {
		sort($fichsliste);
		sort($dirliste);
	}
	else{
		sort($dirliste);
	}


	//Affichage du tableau des répertoires

	for($i=0;$i < count($dirliste);$i++){
		$ext = "repertoire";
		echo "<tr valign=\"top\"><td>";
		
		if ($this->nav_dir){
			echo "&nbsp;<a href='".$mydirSansPoint ."exploration2.php?dir=".rawurlencode($dirliste[$i])."'>".$dirliste[$i]."</a><br />\n";
		}
		else{
			echo "&nbsp;".$dirliste[$i]."<br />\n";
		}
    }

 	//Affichage du tableau des fichiers
	for($i=0;$i < count($fichsliste);$i++){

			$ext = $this->get_ext($fichsliste[$i]);
			$lien = $mydir."/".$fichsliste[$i];
			
			echo "<tr><td>";
			if ($ext != "ico"){
			}
			
			echo "&nbsp;<a href=\"".$lien." \">".$fichsliste[$i]."</a><br />\n";
			echo "<td>&nbsp;&nbsp;&nbsp;".date(  'd/m/Y', filemtime($mydir."/".$fichsliste[$i]) )."</td></tr>";
	}
}

}
?>
<html>
	<head>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet">
	</head>

	<body>
		<h2>Explorateur</h2>
		<table>
			<tr>
				<th id="nom">&nbsp;&nbsp;&nbsp;Nom</th>
				<th id="date">&nbsp;&nbsp;&nbsp;Date de modification</th>
			</tr>  
		
		<?php

			$dir = @$_GET['dir'];
			$liste = new MyFiles();

			if(!$dir) {
			  $dir = ".";
			}
			else{
				echo "<tr><td>";
				echo "&nbsp;..</a><br />\n";
				echo "</td><td></td><td></td></tr>";
			}
			$liste->list_file(rawurldecode($dir));
		?>
		</table>
		<input class="imput" type="button" value="Retour" onclick="javascript:history.back()">
	</body>
</html>