
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  
</head>

<!-- Main[Start] -->
<a class="navbar-brand" href="select.php">ユーザー一覧</a>
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
    <form action="insert.php" method ="post">
     <label>名前：<input type="text" name="name"></label><br>
     <label>E-mail：<input type="text" name="email"></label><br>
     <label><textArea name="detail" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信" hlef="select.php">
     </form>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
