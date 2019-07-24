<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$meta['title']?></title>
        <meta name="description" content="<?=$meta['desc']?>">
        <meta name="keywords" content="<?=$meta['keywords']?>">
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <?php if (!empty($menu)):?>
            <ul class="nav nav-pills">
                <?php foreach ($menu as $item):?>
                    <li><a href="category/<?= $item['id'] ?>"><?= $item['category_name'] ?></a></li>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
            <h1>Hello, world!</h1>

            <?=$content?>

            <?/*= debug(vendor\core\Db::$countSql)*/?><!--
        --><?/*= debug(vendor\core\Db::$queries)*/?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <?php
            foreach ($scripts as $script) {
                echo $script;
            }
        ?>
    </body>
</html>