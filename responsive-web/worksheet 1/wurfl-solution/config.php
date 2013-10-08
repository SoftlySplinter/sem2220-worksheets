<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

/* Important: You need to edit these two paths */
/* WURFL_DIR needs to point to the install directory for WURFL */
define('__ROOT__', dirname(dirname(__FILE__)));
define("WURFL_DIR", __ROOT__ . '/wurfl-solution/wurfl-php-1.4.1/WURFL/');
/* RESOURCES_DIR needs to point to the resources directory you want to use. */
define("RESOURCES_DIR", __ROOT__ . '/wurfl-solution/wurfl-php-1.4.1/examples/resources/');

$app_path         = WURFL_DIR . 'Application.php';
$wurflConfigFile  = RESOURCES_DIR . 'wurfl-config.xml';

if (!file_exists($app_path)) {
  print '<h2>Oh, dear</h2> <p>WURFL is looking for the "Application.php" file here:<br /><code>' . $app_path
    . '"</code><br />Sadly, it is not finding it. Check the path set for "WURFL_DIR" in config.php</p>';
}
if (!file_exists($wurflConfigFile)) {
  print '<h2>Oh, dear</h2> <p>WURFL is looking for the "wurfl-config.xml" file here:<br /><code>' . $wurflConfigFile
    . '"</code><br />Sadly, it is not finding it. Check the path set for "RESOURCES_DIR" in config.php</p>';
}
require_once($app_path);
?>