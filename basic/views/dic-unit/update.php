<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DicUnit */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dic Unit',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dic Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dic-unit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
