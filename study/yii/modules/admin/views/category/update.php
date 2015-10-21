<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Категории'=>array('index'),
	'Изменение '.$model->namecategory,
);

$this->menu=array(
	array('label'=>'Показать категории', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'Просмотреть категорию', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

    <h1>Изменить категорию <?php echo $model->namecategory; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>