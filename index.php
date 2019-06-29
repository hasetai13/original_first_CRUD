<?php
function h($h){
    return htmlspecialchars($h);
}
//db接続
require "connect_db.php";
//データ取得
$stm = $db->query("select * from practice_sql order by id desc");
$posts = $stm->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}


$start = ($page-1) * 5;
$max = 5;
$cnt_datas = count($posts);
$max_page = ceil($cnt_datas/$max);
$posts  = array_slice($posts, $start, $max);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD掲示板</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Norikiru</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#">Norikiruとは？<span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#">大学名で探す</a></li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">教員を探す</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">楽単度検索</a>
          <a class="dropdown-item" href="#">ヤバイ度検索</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">その他</a>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="#">楽単ランキング</a>
        </li>
        </ul>
            <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        <h4 class="text-left mt-4">教員情報：<?php print $cnt_datas; ?>件</h4>
        <table class="table table-striped mt-4">
            <thead class="thead">
                <tr>
                    <th scope="col">教員名</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($posts as $post): ?>
                <tr>
                    <td>
                        <a href="detail.php"><?php print $post['content']; ?></a>
                    </td>
                    <td>
                        <a href="update.php?id=<?php print $post['id']; ?>">編集する</a>
                    </td>
                    <td>
                        <a href="delete_do.php?id=<?php print $post['id']; ?>">削除する</a>     
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <form action="insert_do.php" method="post">
            <div class="form-group form-inline mt-5">
                <label for="content" class="mr-3">教員名：</label>
                <input type="text" class="form-control col-sm-4 mr-3" name="content">
                <button type="submit" class="btn btn-primary">新規登録</button>
            </div>
        </form>
        <div class="pagenaton mt-5">
        <?php if($page > 1): ?>
            <a href="?page=<?php print $page-1; ?>">前のページへ</a>|
        <?php endif; ?>
        <?php for($i=2; $i > 0; $i--): ?>
            <?php if($page-$i>0): ?>
                <a href="?page=<?php print $page-$i; ?>"><?php print $page-$i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
            <a href="">現在<?php print $page; ?>ページ目</a>
        <?php for($i=1; $i<3; $i++): ?>
            <?php if($page+$i < $max_page+1): ?>
                <a href="?page=<?php print $page+$i; ?>"><?php print $page+$i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if($page < $max_page): ?>
            |<a href="?page=<?php print $page+1; ?>">次のページへ</a>
        <?php endif; ?>
        </div>    
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>