<?php
//1. GETデータ取得
$id = $_GET['id'];


//2. DB接続します(エラー処理追加)
include('functions.php'); //includeで呼び出す
$pdo = db_conn();


//3．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_php03_table WHERE id=:id');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  //select.phpへリダイレクト
  header('Location: select.php');
  exit;
}
?>
