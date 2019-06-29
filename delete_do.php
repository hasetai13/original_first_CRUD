<?php
require "connect_db.php";
$statement = $db->prepare("delete from practice_sql where id = :delete_id");
$statement->bindParam(':delete_id', $id);
$id = $_GET['id'];
$statement->execute();
header("Location:/");