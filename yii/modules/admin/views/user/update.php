<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Управление пользователями'=>array('index'),
	'Изменение категории',
);

$this->menu=array(
	array('label'=>'Управление пользователями', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Изменить пароль', 'url'=>array('password','id'=>$model->id)),
);
?>

<h1>Изменение пользователя <?php echo $model->username; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>