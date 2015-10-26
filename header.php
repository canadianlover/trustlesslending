<?php # header.php - contains all code needed for all pages
// load twig


error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once('config.php');
require_once('database.php');
require_once('twig/lib/Twig/Autoloader.php');
// establish connection to database
$dbc = new db_class(DB_USER, DB_PASS, DB_HOST, DB_NAME);

//register twig
Twig_Autoloader::register();

// load page template
$loader = new Twig_Loader_Filesystem('templates/webdesign');
$twig = new Twig_Environment($loader, array('cache' => 'twig/compilation_cache', 'auto_reload' => true));
	// create template object
	echo $twig->render('header.html', array('title' => $title));
?>