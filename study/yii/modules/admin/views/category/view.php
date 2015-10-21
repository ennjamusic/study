<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Категории'=>array('index'),
	$model->namecategory,
);

$this->menu=array(
	array('label'=>'Показать категории', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'Изменить категорию', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить категорию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->namecategory; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'namecategory',
		'description',
		'image_id',
	),
)); ?>
