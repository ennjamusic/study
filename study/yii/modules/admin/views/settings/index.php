<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
	'Настройки сайта',
);

?>

<h1>Настройки сайта</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>