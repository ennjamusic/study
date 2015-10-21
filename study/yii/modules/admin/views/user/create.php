<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Управление пользователями'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Управление пользователями', 'url'=>array('index')),
//	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Создать пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>