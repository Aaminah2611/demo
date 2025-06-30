<?php

require 'vendor/autoload.php';
require 'functions.php';
require 'Database.php';

$config = require('config.php');

//create new instance of database class
$db = new Database($config['database']);

$id = ($_GET['id']); 

$query = "select * from posts where id= :id";

// SQL Injection: when accepting user input through query string/query form, never in-line as part of SQL query. 
// That's what allows for SQL Injection. Especially if query is not formatted properly. 
// solution: don't in-line directly, instead, replace with '?' Something we will later associate/bind with query.
// can use '?'or can use key (:id). Can use colon/not, up to you. 
// Think of it as 2 separate boats - send query and params on separate boat. 
// bind params by adding 'params' to execute method in Database class. 
// This way is someone tries to do anything malicious(drop users table), it won't work. 

// call query method
// combine id 
$posts = $db->query($query, [':id' => $id]) -> fetch(); //can decide here whether you want to fetch/fetchAll

dd($posts);

