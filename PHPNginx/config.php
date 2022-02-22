<?php

$mysqlUsername = getenv("MYSQL_USERNAME");
$mysqlHost = getenv("MYSQL_HOST");
$mysqlPassword = getenv("MYSQL_PASSWORD");
$mysqlDatabase = getenv("MYSQL_DATABASE");

$conn = new PDO("mysql:host=$mysqlHost;dbname=$mysqlDatabase", $mysqlUsername, $mysqlPassword);