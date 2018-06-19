<?php

/* @var $this yii\web\View */

use yii\bootstrap\Carousel;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php echo Carousel::widget([
    'items' => [
    // the item contains only the image
    '<img src="data:image/jpeg;base64,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"/>',
    // equivalent to the above
    ['content' => '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhWq2by7P4yCMfBjkdzFqvGUGZaQAw7jiAmZEQp1kL58likZnZ"/>'],
    // the item contains both the image and the caption
    [
    'content' => '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKXWj2cXq6lrdmtPpAJ6POXNTCLiSyEIJCuvsJyZOJRBqPjH8KMA"/>',
    'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
//    'options' => [...],
    ],
    ]
    ]);
?>
        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
