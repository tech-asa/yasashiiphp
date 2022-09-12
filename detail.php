<?php
    $user = "root";
    $pass = "root";
    if(empty($_GET["id"])){
        echo "IDを正しく入力してください";
        exit;
    }
    try {
        $id = (int)$_GET["id"];
        $dbh = new PDO("mysql:host = localhost; dbname=db1; charset=utf8", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM recipes WHERE id = ?";
        $stml = $dbh->prepare($sql);
        $stml->bindValue(1, $id, PDO::PARAM_INT);
        $stml->execute();
        $result = $stml->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        $dbh = null;
    } catch (PDOException $e) {
        echo "エラー発生：". htmlspecialchars($e->getMessage(), ENT_QUOTES)."<br>";
        exit;
    }
?>