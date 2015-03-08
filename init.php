<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'models/DB.php';
require_once 'models/GoogleAuth.php';

$db = new DB;
$googleClient = new Google_Client;
$auth = new GoogleAuth($db, $googleClient);
