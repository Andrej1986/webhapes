<?php
/* @var $this yii\web\View */
?>

<div class="product-details">
    <h2><?= $product['name'] ?></h2>

    <pre>
    <?= $product['description'] ?>
</pre>

    <h4>Cena: <?= $product['price'] ?><?= $product['category'] === 'na mieru' ? '€/h' : '€' ?></h4>
    <h4>Dodacia lehota: 30 dní</h4>
</div>
