<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力フォーム</title>
</head>
<body>
       入力フォーム<br>
       <form action="receive.php" method="POST">
            料理名：<input type="text" name="recipe_name" required>
            カテゴリ：
            <select name="category" id="">
                <option hidden>選択してください</option>
                <option value="1">和食</option>
                <option value="2">中華</option>
                <option value="3">洋食</option>
            </select>
            <br>
            難易度：
            <input type="radio" name="difficulty" value="1">簡単
            <input type="radio" name="difficulty" value="2" checked>普通
            <input type="radio" name="difficulty" value="3">難しい
            <br>
            予算：
            <input type="number" min="1" max="9999" name="budget">円
            <br>
            作り方：
            <textarea name="howto" id="" cols="40" rows="4" maxlength="320"></textarea>
            <br>
            <input type="submit" name="" id="" value="送信">
       </form>
</body>
</html>