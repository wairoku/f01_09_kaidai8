<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST['name']) || $_POST['name']=='' ||
  !isset($_POST['email']) || $_POST['email']=='' ||
  !isset($_POST['detail']) || $_POST['detail']==''
){
  exit('ParamError');
}

//1. POSTデータ取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$email  = $_POST["email"];
$detail = $_POST["detail"];


//2. DB接続します(エラー処理追加)
include('functions.php'); //includeで呼び出す
$pdo = db_conn();


//3．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_php03_table SET name=:a1,email=:a2,detail=:a3 WHERE id=:id'); //WHEREはどこを更新したいか
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $email, PDO::PARAM_STR);
$stmt->bindValue(':a3', $detail, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  header('Location: select.php');
  exit;
}
?>
