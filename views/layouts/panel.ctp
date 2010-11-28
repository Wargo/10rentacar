<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->element('css_panel');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo __('Panel de gestión 10rentacar', true); ?></h1>
            <?php echo $this->element('panel/menu'); ?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
            <?php echo $html->link(__('10rentacar.es', true), '/'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->element('js_panel'); ?>
</body>
</html>
