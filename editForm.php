<?php
// 該当のユーザー取得処理
require "database.php";
$stmt = $pdo->prepare(
            "select 
                *
            from 
                `users` 
            where 
                id = :id
            ;"
        );
$stmt->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー編集画面</title>
</head>
<body>
    <h1>ユーザー情報編集画面</h1>
    <form action="/userEdit.php" method="post">
        <!-- 各入力フォーム -->
        <div>
            <label for="name">名前: </label>
            <input type="text" name="name" value="<?php echo $user["name"]; ?>" />
        </div>
        <div>
            <label for="age">年齢: </label>
            <input type="number" name="age" value="<?php echo $user["age"]; ?>" />
        </div>
        <div>
            <label>性別: </label>
            <?php if ($user["gender"] === "男性"): ?>
                <input type="radio" name="gender" id="man" value="男性" checked />
                <label for="man">男性</label>
                <input type="radio" name="gender" id="woman" value="女性" />
                <label for="woman">女性</label>
            <?php else: ?>
                <input type="radio" name="gender" id="man" value="男性" />
                <label for="man">男性</label>
                <input type="radio" name="gender" id="woman" value="女性" checked />
                <label for="woman">女性</label>
            <?php endif; ?>
        </div>
        <input type="submit" value="編集" />
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
    </form>
</html>