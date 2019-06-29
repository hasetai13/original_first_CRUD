<?php
require "connect_db.php";
$statement = $db->prepare("update practice_sql set content =:content where id = :id");
$statement->bindParam(':content', $content);
$statement->bindParam(':id', $id);
$content = $_POST['up_content'];
$id = $_GET['id'];
$statement->execute();
header("Location:/");