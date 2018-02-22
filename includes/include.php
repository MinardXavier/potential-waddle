<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once '../vendor/autoload.php';

// Create (connect to) SQLite database in file
$db = new PDO('sqlite:../db.sqlite3');
// Set errormode to exceptions
$db->setAttribute(PDO::ATTR_ERRMODE,
  PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE TABLE IF NOT EXISTS USER (
                    id INTEGER PRIMARY KEY, 
                    name TEXT,
                    message TEXT)");

use GuzzleHttp\Client;

$foass = new Client([
  // Base URI is used with relative requests
  'base_uri' => 'https://www.foaas.com',
  // You can set any number of default request options.
  'timeout'  => 2.0,
  'headers' => [
    'Accept' => 'text/plain'
  ]
]);