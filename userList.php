<?php
// ユーザー情報の取得
require "database.php";
$stmt = $pdo->prepare("select * from `users`;");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー一覧</title>
</head>
<body>
    <h1>ユーザー情報一覧</h1>
    <table>
        <!-- ユーザー情報の出力 -->
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>年齢</th>
                <th>性別</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user["id"]; ?></td>
                    <td><?php echo $user["name"]; ?></td>
                    <td><?php echo $user["age"]; ?></td>
                    <td><?php echo $user["gender"]; ?></td>
                    <td>
                        <form action="/editForm.php" method="get">
                            <input type="submit" value="編集">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        </form>
                    </td>
                    <td>
                        <form action="/userDelete.php" method="post">
                            <input type="submit" value="削除">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/createForm.php">ユーザーの新規登録</a>
</body>
</html>