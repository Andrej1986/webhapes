<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Tvorba web stránok - Obchod';
?>
<div class="site-shop">
    <h1>Obchod</h1>

	<?php foreach ($categories as $category): ?>
        <hr>
        <h3>Kategória: <i><?= $category['name'] ?></i></h3>
		<?php foreach ($products as $product): ?>
			<?php if ($category['name'] === $product['category']): ?>
                <div class="col-md-offset-2 col-md-3  product">
                    <a href="<?= Url::to(['//product/index', 'id' => $product['id']]) ?>"><h4><?= $product['name'] ?></h4></a>
                    <pre><?= $product['introduction'] ?></pre>
                    <p>Cena:
						<?= $product['price'] ?>&euro;<?= ($product['category']) === 'na mieru' ? '/hodina' : '' ?></p>
                    <a href="<?= Url::to(['//cart/index', 'id' => $product['id']]) ?>"
                       class="btn btn-confirm">Objednať</a>
                </div>
			<?php endif; ?>
		<?php endforeach; ?>
        <div class="clearfix"></div>
	<? endforeach; ?>

</div>
