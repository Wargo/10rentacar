<div class="home">
	<h3 class="right"><?php echo __('Alquiler de vehículos', true); ?></h3>
	<div class="search">
		<?php echo $this->element('search_form'); ?>
	</div>
	<h3><?php echo __('Servicios', true); ?></h3>
	<div class="clearfix">
		<?php echo $this->element('block', array('model' => 'Service')); ?>
	</div>
	<h3><?php echo __('Noticias', true); ?></h3>
	<div class="clearfix">
		<?php echo $this->element('block', array('model' => 'News')); ?>
	</div>
	<h3><?php echo __('Flota', true); ?></h3>
	<div class="clearfix">
		<?php echo $this->element('block', array('model' => 'Car')); ?>
	</div>
</div>
