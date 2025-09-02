<?php
// ユーザー情報の更新処理
require "database.php";
$stmt = $pdo->prepare(
            "update 
                        `users`
                    set
                        `name` = :name,
                        `age` = :age,
                        `gender` = :gender
                    where 
                        `id` = :id
            ;"
        );

$stmt->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
$stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
$stmt->bindParam(":age", $_POST["age"], PDO::PARAM_INT);
$stmt->bindParam(":gender", $_POST["gender"], PDO::PARAM_STR);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>編集完了</title>
    </head>
    <body>
        <h1>ユーザーの編集が完了しました</h1>
        <p>編集したユーザー情報は以下の通りです。</p>
        <p>
        <!-- 編集した情報の表示 -->
            名前：<?php echo $_POST["name"] ?><br>
            年齢：<?php echo $_POST["age"] ?>歳<br>
            性別：<?php echo $_POST["gender"] ?><br> 
        </p>
        <a href="userList.php">一覧へ戻る</a>
    </body>
</html>