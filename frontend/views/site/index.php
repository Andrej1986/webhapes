<?php

/* @var $this yii\web\View */

use yii\bootstrap\Carousel;

$this->title = 'Tvorba web stránok - WebHAPES';
?>
<div class="site-index">

    <div class="row the-carousel">
		<?php echo Carousel::widget([
			'items' => [

				[
					'content' => '<img style="width: 100%" src="images/4.jpg"/>',
					'caption' => '
<a href="index.php?r=site%2Fshop">
 <h4>Do obchodu</h4><p>Vyberte si z našej ponuky</p>
</a>
',
					'url'     => ['site/about']
				],// equivalent to the above
				[
					'content' => '<img style="width: 100%" src="images/6.png"/>',
					'caption' => '
<a href="index.php?r=site%2Fcooperation">
<h4>Ďalšie možnosti spolupráce</h4>
</a>

',
				],

				[
					'content' => '<img style="width: 100%" src="images/phone2-1.jpg"/>',
					'caption' => '
<a href="index.php?r=site%2Fcontact">
<h4>Kontaktujte nás</h4><p>V prípade otázok radi pomôžeme</p>
</a>
',
//					'options' => [],
				],
			]
		]);
		?>
    </div>
    <div class="row container-fluid">
		<?php foreach ($products as $product): ?>
            <div class="col-md-offset-2 col-md-3  product">
                <h4><?= $product['name'] ?></h4>
                <pre><?= $product['introduction'] ?></pre>
                <p>Cena: <?= $product['price'] ?>&euro;<?= ($product['category']) === 'na mieru' ? '/hodina' : '' ?></p>
            </div>
		<?php endforeach; ?>
    </div>

</div>
