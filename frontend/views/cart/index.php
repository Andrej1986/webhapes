<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Tvorba web stránok - Košík';

?>
<div class="site-cart">
    <h1>Košík</h1>
	<?php if ($products): ?>
		<?php foreach ($products as $product): ?>
            <input class="item-<?= $product['id'] ?>-category" type="hidden" value="<?= $product['category'] ?>">
            <div class="cart-item cart-item-<?= $product['id'] ?>">
                <h4 class="col-sm-4">
                    <small> Názov:</small>
					<?= $product['name'] ?>
                </h4>
                <h4 class="col-sm-4 item-<?= $product['id'] ?>-price">
                    <small> Cena:</small>
                    <span><?= $product['price'] ?></span><?= $product['category'] === 'na mieru' ? '€/h' : '€' ?>
                </h4>
                <h4 class="col-sm-4 item-<?= $product['id'] ?>-amount">
                    <small> Množstvo:</small>
                    <span> <?= Yii::$app->session->get('item_' . $product['id']) ?></span>
                </h4>
                <div class="clearfix"></div>
                <!--            <div class="total">-->
                <div class="item-second-row">
                    <h4 class="col-sm-6 total item-<?= $product['id'] ?>-total">
                        <small> Celkom za položku <?= $product['name'] ?>:</small>
                        <span><?= (($product['category'] !== 'na mieru' ? Yii::$app->session->get('item_' . $product['id']) : 1) * $product['price']) ?></span>€<?= $product['category'] === 'na mieru' ? '/hod' : '' ?>
                    </h4>
                    <a onclick="Cart.increaseCartItem('<?= $product['id'] ?>', '<?= Url::to(['//cart/ajax-increase-item']) ?>')"
                       title="pridať" href="<?= Url::to(['//cart/decrease-item', 'id' => $product['id']]) ?>">+</a>
                    <a onclick="Cart.decreaseCartItem('<?= $product['id'] ?>', '<?= Url::to(['//cart/ajax-decrease-item']) ?>')"
                       title="ubrať" href="<?= Url::to(['//cart/decrease-item', 'id' => $product['id']]) ?>">-</a>
                    <a onclick="Cart.removeCartItem('<?= $product['id'] ?>', '<?= Url::to(['//cart/ajax-remove-item']) ?>')"
                       title="odstrániť položku"
                       href="<?= Url::to(['//cart/remove-item', 'id' => $product['id']]) ?>">X</a>
                    <!--            </div>-->
                </div>
            </div>
			<?php $product['category'] === 'na mieru' ? Yii::$app->session->set('na_mieru', true) : Yii::$app->session->remove('na_mieru') ?>

            <hr>
		<?php endforeach; ?>

        <!--	--><?php //if (!empty($products)): ?>
        <a href="<?= Url::to(['//site/shop']) ?>" class="btn btn-confirm">Pokračovať v nákupe</a>
        <a href="<?= Url::to(['//an-order/customer-info']) ?>" class="btn btn-confirm">Prejsť k objednávke</a>

	<?php endif; ?>


	<?php if (!$products): ?>
        <h4>Košík je prázdny</h4>
	<?php endif; ?>
</div>

