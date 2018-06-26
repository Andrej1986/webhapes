<?php

use yii\helpers\Url;
$the_url = Url::to(['//site/shop'])?:'';
header( "refresh:3;url={$the_url}" );
?>

<h1>Objednávka bola úspešne dokončená!</h1>
