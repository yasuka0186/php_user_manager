<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録画面</title>
</head>
<body>
    <h1>ユーザー新規登録画面</h1>
    <form action="userCreate.php" method="post">
        <!-- 各種入力フォーム -->
        <div>
            <label for="name">名前: </label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="age">年齢: </label>
            <input type="number" name="age" id="age">
        </div>
        <div>
            <label for="gender">性別: </label>
            <input type="radio" name="gender" value="男性" id="man">
            <label for="man">男性</label>
            <input type="radio" name="gender" value="女性" id="woman">
            <label for="woman">女性</label>
        </div>
        <input type="submit" value="登録">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</body>
</html>