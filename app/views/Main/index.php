<?php if (LAYOUT == 'default'):?>
    <div class="container">
        <div id="answer"></div>
        <button class="btn btn-default" id="send">Кнопка</button>
        <?php new \myFramework\widgets\menu\Menu([
            //'tpl' => WWW . '/menu/my_menu.php',
            'tpl' => WWW . '/menu/select.php',
            'container' => 'select',
            'class' => 'my_menu',
            'table' => 'categories',
            'cache' => 36,
            'cacheKey' => 'vendor_menu',
        ]); ?>
        <?php if (!empty($posts)):?>
            <?php foreach ($posts as $post):?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $post['title'] ?></div>
                    <div class="panel-body">
                        <?= $post['text'] ?>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="text-center">
                <p>Статей: <?=count('posts');?> из <?=$total;?></p>
                <?php if ($pagination->countPages > 1):?>
                    <?=$pagination;?>
                <?php endif;?>
            </div>
        <?php endif;?>
    </div>
    <script src="/js/test.js"></script>
    <script>
        $(function () {
            $('#send').click(function () {
                $.ajax({
                    url: '/main/test',
                    type: 'post',
                    data: {'id':2},
                    success: function (res) {
                        ///console.log(res);
                        //var data = JSON.parse(res);
                        //$('#answer').html('<p>Ответ: '+ data.answer + ' | Код: '+ data.code + '</p>');
                        $('#answer').html(res);
                    },
                    error: function () {
                        alert('Error!');
                    }
                });
            });
        });
    </script>
<?php else: ?>
    <?php if(!empty($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div class="content-grid-info">
                <img src="/blog/images/post1.jpg" alt=""/>
                <div class="post-info">
                    <h4><a href="<?=$post->id;?>"><?=$post->title;?></a>  July 30, 2014 / 27 Comments</h4>
                    <p><?=$post->excerpt;?></p>
                    <a href="<?=$post->id;?>"><span></span>READ MORE</a>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <p>Статей: <?=count($posts);?> из <?=$total;?></p>
            <?php if($pagination->countPages > 1): ?>
                <?=$pagination;?>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <h3>Posts not found...</h3>
    <?php endif; ?>
<?php endif; ?>
