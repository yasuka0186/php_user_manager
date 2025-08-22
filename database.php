<?php
    $dns = "mysql:dbname=user_manager;host=localhost;charset=utf8mb4";
    $user = "root";
    $password = "yasuka64";
    $opt = [];

    $pdo = new PDO($dns, $user, $password, $opt);