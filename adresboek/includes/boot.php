<?php
session_start();
define('BASEPATH',$_SERVER['DOCUMENT_ROOT'].'/project-5/adresboek/');

include BASEPATH."includes/functions.php";

spl_autoload_register('autoloadClasses');

new \Menno\Database('localhost', 'adresboek', 'bartmenno', 'school');

showMessage();