<?php
    require_once __DIR__ . "/../../db_config.php";
    if(empty($_GET["id"])){
        echo "IDを正しく入力してください";
        exit;
    }
    $id = (int)$_GET["id"];
    try {
        $dbh = new PDO("mysql:host = localhost; dbname=db1; charset=utf8", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM recipes WHERE id = ?";
        $stml = $dbh->prepare($sql);
        $stml->bindValue(1, $id, PDO::PARAM_INT);
        $stml->execute();
        $result = $stml->fetch(PDO::FETCH_ASSOC);
        $difficulty = "";
        if (htmlspecialchars($result["difficulty"], ENT_QUOTES) == "1") {
            $difficulty = "簡単";
        } elseif (htmlspecialchars($result["difficulty"], ENT_QUOTES) == "2") {
            $difficulty = "普通";
        } elseif (htmlspecialchars($result["difficulty"], ENT_QUOTES) == "3") {
            $difficulty = "難しい";
        }
        echo "料理名" . htmlspecialchars($result["recipe_name"],ENT_QUOTES) . "<br>" . PHP_EOL;
        echo "カテゴリ" . htmlspecialchars($result["category"],ENT_QUOTES) . "<br>" . PHP_EOL;
        echo "予算" . htmlspecialchars($result["budget"],ENT_QUOTES) . "<br>" . PHP_EOL;
        echo "難易度" . $difficulty . "<br>" . PHP_EOL;
        echo "作り方:<br>" . nl2br(htmlspecialchars($result["howto"],ENT_QUOTES)) . "<br>" . PHP_EOL;
        echo "<br><a href='index.php'>トップページに戻る</a>";
        $dbh = null;
    } catch (PDOException $e) {
        echo "エラー発生：". htmlspecialchars($e->getMessage(), ENT_QUOTES)."<br>";
        exit;
    }
?>