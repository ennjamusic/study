<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'Операции',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
    ));
    $this->endWidget();
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Управление сайтом',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
                array('label'=>'Категории', 'url'=>array('/admin/category'),
//                    'items'=> array(
//                        array('label'=>'Создать', 'url'=>array('/category/create')),
//                    ),
                ),
                array('label'=>'Пользователи', 'url'=>array('/admin/user')),
                array('label'=>'Отзывы', 'url'=>array('/admin/review')),
                array('label'=>'Заказы', 'url'=>array('/admin/order')),
                array('label'=>'Страницы', 'url'=>array('/admin/page')),
                array('label'=>'Комментарии', 'url'=>array('/admin/comment')),
                array('label'=>'Резервное копирование', 'url'=>array('/admin/backup')),
                array('label'=>'Настройки', 'url'=>array('/admin/settings')),
            ),
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>