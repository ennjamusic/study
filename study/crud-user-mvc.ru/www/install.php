<?php
    header("Charset: utf-8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Установка продукта</title>
    <style>

    </style>

</head>
<body>
<?php
if(!isset($_GET["STEP"])) {
?>
    <h2>
        Добро пожаловать!
    </h2>

    <div>
        Для продолжения установки нажмите "Далее"
    </div>
    <a href="?STEP=1" class="like-button">Далее</a>
<?php
}

if($_GET["STEP"]==1) {
    $zip = new ZipArchive;
    $res = $zip->open($_SERVER["DOCUMENT_ROOT"]."/".$_GET['EXTRACT']);
    if ($res === TRUE) {
        $zip->extractTo($_SERVER["DOCUMENT_ROOT"]);
        $zip->close();
        ?>
        <div>Продукт установлен!</div>
        <a href="?STEP=2" class="like-button">Далее</a>
    <?php
    } else {
        echo 'ошибка';
    }
}

if($_GET["STEP"]==2) {
    ?>
    <div>
        Для корректной работы рекомендуется настроить ваше приложение в файле конфигурации /engine/protected/config/config.php
    <div>
    <a href="/" class="like-button">Перейти к вашему приложению</a>
    <?php
}
?>

</body>
</html>