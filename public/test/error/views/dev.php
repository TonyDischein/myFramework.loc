<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>
    <h1>Произошла ошибка</h1>
    <p><b>Код ошибки:</b><?= $errno ?></p>
    <p><b>Текст ошибки:</b><?= $errstr ?></p>
    <p><b>Фаил, в котором произзошла ошибка:</b><?= $errfile ?></p>
    <p><b>Строка, в которой произзошла ошибка:</b><?= $errline ?></p>
</body>
</html>