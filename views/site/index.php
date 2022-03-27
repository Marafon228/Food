<?php

/* @var $this yii\web\View */
/* @var $pages yii\data\Pagination */
/* @var $posts app\models\Articles */

use yii\bootstrap4\LinkPager;
use app\models\Categories;

$this->title = Yii::$app->name;

?>
<div class="site-index">

    <p class="text-right"><b>Количество выполненных заявок:</b> <span id="post_count">Загрузка ...</span></p>

    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-md-6">
                <div class="card mb-3">
                    <img src="/uploads/<?= $post->img_before ?>" alt="<?= $post->title ?>" class="card-img-top" />
                    <div class="card-body">
                        <div class="row text-muted">
                            <div class="col-md-6"><b>Дата создания:</b> <?= date('d.m.Y H:i:s', $post->datetime) ?></div>
                            <div class="col-md-6"><b>Категория:</b> <?= Categories::findOne($post->id_category)->title ?></div>
                        </div>
                        <h5 class="card-title"><?= $post->title ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>


    <?= LinkPager::widget([
        'pagination' => $pages,
    ]) ?>
</div>

<script>
    function updatePostCount() {
        $.ajax({
            url: "/site/count",
            method: "POST",
            success: function(data){
                $("#post_count").text(data);
            }
        });
    }

    setInterval(() => updatePostCount(), 5000);
</script>