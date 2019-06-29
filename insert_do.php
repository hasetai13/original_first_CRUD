<?php
require "connect_db.php";

$statement = $db->prepare("insert into practice_sql (content) values (:content)");
$statement->bindParam(':content', $content);
$content = $_POST['content'];
$statement->execute();
header("Location:/");
