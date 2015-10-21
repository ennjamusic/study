<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultCommentStatus'); ?>
		<?php echo $form->checkBox($model,'defaultCommentStatus'); ?>
		<?php echo $form->error($model,'defaultCommentStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultReviewStatus'); ?>
		<?php echo $form->checkBox($model,'defaultReviewStatus'); ?>
		<?php echo $form->error($model,'defaultReviewStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultPageStatus'); ?>
		<?php echo $form->checkBox($model,'defaultPageStatus'); ?>
		<?php echo $form->error($model,'defaultPageStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultUserStatus'); ?>
		<?php echo $form->checkBox($model,'defaultUserStatus'); ?>
		<?php echo $form->error($model,'defaultUserStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultTitle'); ?>
		<?php echo $form->textField($model,'defaultTitle',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'defaultTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultDescription'); ?>
		<?php echo $form->textField($model,'defaultDescription',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'defaultDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultKeywords'); ?>
		<?php echo $form->textField($model,'defaultKeywords',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'defaultKeywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultUrlSite'); ?>
		<?php echo $form->textField($model,'defaultUrlSite',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'defaultUrlSite'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Применить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->