<?php
error_reporting(E_STRICT | E_ALL);
date_default_timezone_set('Europe/Paris');
setlocale (LC_TIME, 'fr_FR.utf8','fra');


// =====================  Initialisation
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('CONTROLLERS', ROOT.DS.'controllers');
define('VIEWS', ROOT.DS.'views');
define('MODELS', ROOT.DS.'models');
define('VENDORS', ROOT.DS.'vendors');
define('CLASSES', ROOT.DS.'classes');

// =====================  Détermination du controleur à utiliser: Est-ce que j'ai un paramètre 'c' dans mon URL?
if (isset($_GET['c'])){
	//Il y a un paramètre de précisé: c'est le nom du controleur demandé.
	$controller=strtolower(trim($_GET['c']));
	//echo "le controlleur apple est $controller"; 
	echo '<br>';
}else{
	//Pas de paramètre => le contrôleur par défaut est le contrôleur HOME
	$controller='home';
	//echo "le controlleur $controller "; 
	echo '<br>';
}

// =====================  Détermination de la méthode à appeler: Est-ce que j'ai un paramètre 'm' dans mon URL?
if (isset($_GET['m'])){
		//Il y a un paramètre de précisé: c'est le nom de la méthode demandée.
  $method=strtolower(trim($_GET['m']));
  //echo "la methode $method est appele";
  echo '<br>';
}else{
	//Pas de paramètre => la méthode par défaut est la méthode INDEX
	$method='index';
//echo "la methode $method est appellé";
  echo '<br>';
}

// =====================  Détermination de la id à utiliser: Est-ce que j'ai un paramètre 'id' dans mon URL?
if (isset($_GET['id'])){
  //Il y a un paramètre de précisé: c'est l'identifiant
$id=strtolower(trim($_GET['id']));
//echo $id;
echo '<br>';
}else{
//Pas de paramètre => la méthode par défaut est la méthode INDEX
$id=null;
//echo " null $id ";
}

// =====================  Appel
//On construit le nom du fichier qui contient le contrôleur appelé (ou le contrôleur par défaut)
$controllerfilename=$controller.'C.php';
//echo "creer $controllerfilename ";
echo '<br>';
//On inclut les fichiers nécessaires
include CONTROLLERS.DS.$controllerfilename;
//On construit le nom de la classe que l'on va instancier
$controllerclassname=ucfirst($controller).'Controller';
//echo "la classe $controllerclassname ";
echo '<br>';
//On instancie cette classe
$c=new $controllerclassname();
//On appelle la méthode demandée (ou la méthode par défaut)
if (!is_null($id))
  $c->$method($id);
else
  $c->$method();


?>