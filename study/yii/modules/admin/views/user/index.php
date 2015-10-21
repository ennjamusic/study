<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Управление пользоватеями',
);

$this->menu=array(
//	array('label'=>'Управление пользователями', 'url'=>array('index')),
	array('label'=>'Создание пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'usersecondname',
//		'password',
		'role'=>array(
            'name' => 'role',
            'value' => '($data->role==1)?"Пользователь":"Администратор"',
            'filter' => array(1=>'Пользователь',2=>'Администатор'),
        ),
		'status'=>array(
            'name' => 'status',
            'value' => '($data->status==1)?"Не подтвержден":"Подтвержден"',
            'filter' => array(1=>'Не подтвержден',0=>'Подтвержден'),
        ),
		/*
		'phone',
		'email',
		'adminconfirm',
		'register',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
