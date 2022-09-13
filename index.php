<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ一覧</title>
</head>

<body>
    <h1>レシピの一覧</h1>
    <a href="form.php">レシピの新規登録</a>
</body>

</html>

<?php

try {
    require_once __DIR__ . "/../../db_config.php";

    $dbh = new PDO("mysql:host = localhost; dbname=db1; charset=utf8", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM recipes";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>" . PHP_EOL;
    echo "<tr>" . PHP_EOL;
    echo "
    <th>料理名</th><th>予算</th><th>難易度</th>" . PHP_EOL;
    echo "</tr>" . PHP_EOL;
    foreach ($result as $row) {
        $difficulty = "";
        if (htmlspecialchars($row["difficulty"], ENT_QUOTES) == "1") {
            $difficulty = "簡単";
        } elseif (htmlspecialchars($row["difficulty"], ENT_QUOTES) == "2") {
            $difficulty = "普通";
        } elseif (htmlspecialchars($row["difficulty"], ENT_QUOTES) == "3") {
            $difficulty = "難しい";
        }
        echo "<tr>" . PHP_EOL;
        echo "<td>" . htmlspecialchars($row["recipe_name"], ENT_QUOTES) . "</td>" . PHP_EOL;
        echo "<td>" . htmlspecialchars($row["budget"], ENT_QUOTES) . "</td>" . PHP_EOL;
        echo "<td>" . $difficulty . "</td>" . PHP_EOL;
        echo "<td>" . PHP_EOL;
        echo '<a href="detail.php?id=' . htmlspecialchars($row["id"], ENT_QUOTES).'">詳細</a>' . PHP_EOL;
        echo '<a href="edit.php?id=' . htmlspecialchars($row["id"], ENT_QUOTES).'">編集</a>' . PHP_EOL;
        echo '<a href="delete.php?id=' . htmlspecialchars($row["id"], ENT_QUOTES).'">削除</a>' . PHP_EOL;
        echo "</td>" . PHP_EOL;
        echo "</tr>" . PHP_EOL;
    }
    echo "</table>" . PHP_EOL;
    $dbh = null;
} catch (PDOException $e) {
    echo "エラー発生：" . htmlspecialchars($e->getMessage(), ENT_QUOTES) . "<br>";
    exit;
}
?>