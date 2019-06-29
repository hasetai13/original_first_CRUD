<?php 
try {
    $db = new PDO('mysql:host=localhost;dbname=Practice_db;charset=utf8','root','vagrant',
    array(PDO::ATTR_EMULATE_PREPARES => false));
//    print "データベースに接続成功しました。";
} catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
}