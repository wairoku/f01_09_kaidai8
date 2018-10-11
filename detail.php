<?php
// getで送信されたidを取得
$id = $_GET['id'];
echo "GET:".$id;


//1.  DB接続します
include('functions.php'); //includeで呼び出す
$pdo = db_conn();


//２．データ登録SQL作成，指定したidのみ表示する←重要
$stmt = $pdo->prepare('SELECT * FROM gs_php03_table WHERE id= :id'); //bindvalue
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false){
  // エラーのとき
　errorMsg($stmt);
}else{
  // エラーでないとき
$rs = $stmt->fetch();
  // fetch()で1レコードを取得して$rsに入れる
  // $rsは配列で返ってくる．$rs["id"], $rs["name"]などで値をとれる
  // var_dump()で見てみよう
 }
?>

<!-- htmlは「index.php」とほぼ同じです -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新ページ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザー一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="index.php">ユーザー登録</a></div>
  </nav>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新ページ</legend>
     <label>名前：<input type="text" name="name" value="<?=$rs["name"]?>"></label><br>
     <label>E-mail：<input type="text" name="email" value="<?=$rs["email"]?>"></label><br>
     <label><textArea name="detail" rows="4" cols="40"><?=$rs["detail"]?></textArea></label><br>
     <input type="submit" value="送信">
     <!-- idは変えたくない = ユーザーから見えないようにする valueにidを入れる-->
     <input type="hidden" name="id" value="<?=$rs["id"]?>"> <!--hiddenにすることで枠が見えなくなる-->
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
