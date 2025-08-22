<?php
// ユーザー情報の登録処理
require "database.php";
$stmt = $pdo->prepare(
    "insert into `users`
                (`name`, `age`, `gender`)
            values
                (:name, :age, :gender)
            ;"
);

$stmt->bindParam(":name", $_POST["name"],PDO::PARAM_STR);
$stmt->bindParam(":age", $_POST["age"], PDO::PARAM_INT);
$stmt->bindParam(":gender", $_POST["gender"], PDO::PARAM_STR);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>登録完了</title>
</head>
<body>
    <h1>ユーザーの登録が完了しました</h1>
    <p>登録したユーザー情報は以下の通りです。</p>
    <p>
        <!-- 登録情報の表示 -->
            名前：<?php echo $_POST["name"] ?><br>
            年齢：<?php echo $_POST["age"] ?>歳<br>
            性別：<?php echo $_POST["gender"] ?><br> 
    </p>
    <a href="userList.php">一覧へ戻る</a>
</body>
</html>