<?php

/* @var $this yii\web\View */

use kartik\sidenav\SideNav;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Administrácia!</h2>
    </div>

    <div class="body-content">

        <div class="col-sm-3">
			<?=
			SideNav::widget([
				'type'    => SideNav::TYPE_DEFAULT,
				'heading' => 'Navigácia',
				'items'   => [
					[
						'url'   => Url::to(['//an-order/index']),
						'label' => 'Objednávky',
						'icon'  => 'list-alt'
					],
					[
						'url'   => Url::to(['//category/index']),
						'label' => 'Kategórie',
						'icon'  => 'wrench'
					],
					[
						'url'   => Url::to(['//product/index']),
						'label' => 'Produkty',
						'icon'  => 'home'
					],
					[
						'url'   => Url::to(['//user/index']),
						'label' => 'Užívatelia',
						'icon'  => 'user',
//				'items' => [
//					['label' => 'About', 'icon' => 'info-sign', 'url' => '#'],
//					['label' => 'Contact', 'icon' => 'phone', 'url' => '#'],
//				],
					],
				],
			]);
			?>
        </div>

    </div>
</div>
