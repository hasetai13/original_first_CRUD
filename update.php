<?php
//dbからidに対応したデータをplaceholderに持たせる。
require "connect_db.php";
//データ取得
$statement = $db->prepare("select * from practice_sql where id = :id");
$statement->bindParam(':id', $id);
$id = $_GET['id'];
$statement->execute();
$pre_content = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>編集画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <h1><a class="navbar-brand" href="index.php">Tasklist</a></h1>  
        </div>
    </nav>
    <div class="container">
        <h1>編集画面</h1>
        <form action="update_do.php?id=<?php print $_GET['id']; ?>" method="post">
            <textarea name="up_content" cols="30" rows="10" placeholder="<?php print $pre_content['content']; ?>"></textarea>
            <a href="/">戻る</a>
            <button type="submit">登録する</button>
        </form>        
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>