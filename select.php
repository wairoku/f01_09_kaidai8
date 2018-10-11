<?php
//1.  DB接続します
include('functions.php'); //includeで呼び出す
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_php03_table'); //SELECTでテーブルの中を持ってくる
$status = $stmt->execute();

//３．データ表示
$view='';
if($status==false){
  errorMsg($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる　getで渡しつつdetail.phpに渡したい
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="detail.php?id=' . $result['id'] . '">';  //更新ページへのaタグを作成 detail
    $view .= $result['name'].'[更新日時'.$result['indate'].']'.$result['detail'];
    $view .= '</a>';
    $view .= '　';
    $view .= '<a href="delete.php?id=' . $result['id'] . '">';  //削除用aタグを作成 delete
    $view .= '［削除］';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>データ一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ユーザー登録</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>