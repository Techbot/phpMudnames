<?php

chdir('../');
require('./mudnames.php');

$file = (isset($_GET['f']) && !empty($_GET['f'])) ? $_GET['f'] : 'random' ;

//$gname = new mudnames();

$name = Mudnames::generate_name_from($file);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Mudnames-php</title>
	<link type="text/css" href="style.css" title="Main style" rel="stylesheet" />
</head>
<body>
<div id="main">
<p>Ceci est un générateur de noms médiévalo-fantastique. Utile si on est en manque d'imagination pour créer son perso a <acronym title="Donjon & Dragons">D&D</acronym> :)</p>
Nom g&eacute;n&eacute;r&eacute; : <input type="text" value="<?php echo $name ?>" />

<h1>Tips :</h1>
<strong>Fichier utilis&eacute; :</strong> <?php echo Mudnames::get_info('file_used') ?><br/>
<strong>Parties utilis&eacute;es :</strong> <?php print_r(Mudnames::get_info('particles_used')); ?><br/>
<strong>Capacit&eacute; utilis&eacute;e :</strong> <?php echo Mudnames::get_info('capability') . (Mudnames::get_info('is_forced') ? ' -- <em>Forc&eacute;</em>' : ''); ?><br />
<strong>Toutes les capacités :</strong> <?php echo Mudnames::get_info('capability_list'); ?>

<h1>Fichiers de noms :</h1>
<ul>
<?php
foreach (Mudnames::get_file_list() as $namefile) {
	echo '<li><a href="'.$_SERVER['PHP_SELF'].'?f='.$namefile.'">'.$namefile.'</a></li>';
}
?>
</ul>
</div>
</body>
</html>
