<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>出力結果</title>
</head>

<body>

    <?php
    // print_r($_POST);
    echo htmlspecialchars($_POST["recipe_name"], ENT_QUOTES);
    echo "<br>";
    if ($_POST["category"] == "1") echo "和食";
    if ($_POST["category"] == "2") echo "中華";
    if ($_POST["category"] == "3") echo "洋食";
    echo "<br>";
    if ($_POST["difficulty"] == "1") echo "簡単";
    if ($_POST["difficulty"] == "2") echo "普通";
    if ($_POST["difficulty"] == "3") echo "難しい";
    echo "<br>";
    if (is_numeric($_POST["budget"])){
        echo number_format($_POST["budget"]);
    }
    echo "<br>";
    echo nl2br(htmlspecialchars($_POST["howto"], ENT_QUOTES));
    echo "<br>";
    ?>

</body>

</html>