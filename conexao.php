<?php

try {

$pdo = new PDO(

"mysql:host=localhost;dbname=escola;charset=utf8mb4",
"root",
""

);

$pdo->setAttribute(

PDO::ATTR_ERRMODE,

PDO::ERRMODE_EXCEPTION

);

$pdo->setAttribute(

PDO::ATTR_EMULATE_PREPARES,

false

);

} catch (PDOException $e) {

die("Não foi possível conectar ao banco.");

}