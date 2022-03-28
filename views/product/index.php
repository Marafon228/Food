<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Name',
            'Description:ntext',
            'Price',
            [
                'attribute' => 'Image',
                'format' => 'row',
                'content' => function($data){
                    return '<img src="data:image/png;base64,'.base64_encode($data->Image).'" />';
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/pyatnitskoye_kladbishche/86722005634/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Пятницкое кладбище</a><a href="https://yandex.ru/maps/6/kaluga/category/cemetery/184108357/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Кладбище в Калуге</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUBN4QgcD" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
