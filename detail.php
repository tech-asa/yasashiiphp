<?php
    $user = "mysql";
    $pass = "mysql";
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
        echo "料理名" . htmlspecialchars($result["recipe_name"],ENT_QUOTES) . "<br>" . PHP_EOL;
        echo "カテゴリ" . htmlspecialchars($result["category"],ENT_QUOTES) . "<br>" . PHP_EOL;
        echo "予算" . htmlspecialchars($result["budget"],ENT_QUOTES) . "<br>" . PHP_EOL;
        echo "難易度" . htmlspecialchars($result["difficulty"],ENT_QUOTES) . "<br>" . PHP_EOL;
        echo "作り方:<br>" . nl2br(htmlspecialchars($result["howto"],ENT_QUOTES)) . "<br>" . PHP_EOL;
        $dbh = null;
    } catch (PDOException $e) {
        echo "エラー発生：". htmlspecialchars($e->getMessage(), ENT_QUOTES)."<br>";
        exit;
    }
?>