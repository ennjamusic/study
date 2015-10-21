<?php
/* @var $this UrlController */

$this->breadcrumbs=array(
	'Url',
);
?>
<h2>Shorten URL</h2>
<div class="row">
	<form class="col-md-6 shorten-url">
		<input type="text" name="long_url" />
		<input type="submit" name="save" value="Do">
	</form>
	<div class="col-md-6">
		<div class="title">Results</div>
		<div id="url-results">
			<ul>
				<?php
				foreach($urls as $url) {
					?>
					<li><?=CHtml::link($_SERVER['SERVER_NAME'].'/url/redirect?short_url='.$url->short_url,array('url/redirect','short_url'=>$url->short_url))?></a> - <?=$url->long_url?> </li>
					<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>