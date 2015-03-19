<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 05.08.14
 * Time: 23:50
 */
$this->breadcrumbs=array(
    'Административный раздел'=>array('/admin'),
    'Управление пользователями'=>array('index'),
    'Изменение пароля пользователя '.$model->username,
);
echo CHtml::form();
?>
<h1>Измение пароля пользователя <?php echo $model->username;?></h1>
<div class="row">
<!--        --><?php //echo CHtml::label('password',); ?>
<?php echo CHtml::textField('Password'); ?>
<?php //echo $form->error($model,'password'); ?>
<?php echo CHtml::submitButton('Изменить'); ?>
<?php echo CHtml::endForm(); ?>
</div>