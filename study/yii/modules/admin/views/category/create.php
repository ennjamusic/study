<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Категории'=>array('index'),
	'Создание категории',
);

$this->menu=array(
	array('label'=>'Показать категории', 'url'=>array('index')),
//	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>Создание категории</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>