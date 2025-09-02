<?php
// ユーザー情報の削除
require "database.php";
$stmt = $pdo->prepare("select * from `users` where id = :id;");
$stmt->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch();

$stmt2 = $pdo->prepare("delete from `users` where id = :id;");
$stmt2->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
$stmt2->execute();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>削除完了</title>
</head>
<body>
    <h1>ユーザーの削除が完了しました</h1>
    <p>削除したユーザー情報は以下の通りです。</p>
    <p>
        <!-- 削除した情報の表示 -->
        名前：<?php echo $user["name"] ?><br>
        年齢：<?php echo $user["age"] ?>歳<br>
        性別：<?php echo $user["gender"] ?><br> 
    </p>
    <a href="userList.php">一覧へ戻る</a>
</body>
</html>