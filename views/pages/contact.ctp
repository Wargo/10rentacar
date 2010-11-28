<?php
$this->set('menu_section', 'contacto');
?>
<div class="left width60">
	<?php
	$this->layout = 'default';
	echo $form->create('Form', array('class' => 'form', 'url' => array('controller' => 'basics', 'action' => 'send_form', 'contact')));
	echo $form->inputs(array(
		'fieldset' => false,
		'name' => array(
			'label' => __('Nombre', true),
		),
		'email' => array(
			'label' => __('Email', true),
		),
		'subject' => array(
			'label' => __('Asunto', true),
		),
		'comment' => array(
			'label' => __('Comentario', true),
			'type' => 'textarea'
		),
	));
	echo $form->submit(__('Enviar', true), array('div' => 'submit right'));
	echo $form->end();
	?>
</div>
<div class="right width40">
	<div class="empty_content">
		<p><?php echo __('Lorem ipsum...', true); ?></p>
	</div>
</div>
