<?php

require_once("./config.php");
require_once("./todo.php");

$conn = new PDO("mysql:$mysqlHost;dbname=$mysqlDatabase", $mysqlUsername, $mysqlPassword);
$todo = new Todo();

$todo->connect($conn);
$todo->selectAllQueryMethod();

// Close the connection after use
$conn = null;
