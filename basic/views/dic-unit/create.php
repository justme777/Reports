<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DicUnit */

$this->title = Yii::t('app', 'Create Dic Unit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dic Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dic-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
