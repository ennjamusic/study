<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Управление пользователями'=>array('index'),
	'Просмотр пользователя',
);

$this->menu=array(
	array('label'=>'Управление пользователями', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Изменить пароль', 'url'=>array('password', 'id'=>$model->id)),
	array('label'=>'Удалить пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Просмотр пользователя <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'usersecondname',
//		'password',
		'role'=>array(
            'name'=>'role',
            'value'=>($model->role==1)?"Пользователь":"Администратор",
        ),
		'status'=>array(
            'name'=>'status',
            'value'=>($model->role==1)?"Не подтвержден":"Подтвержден",
        ),
		'phone',
		'email',
//		'adminconfirm',
		'register',
	),
)); ?>
