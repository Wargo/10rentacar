<?php
$horas = $minutos = array();
for($i = 0; $i <= 23; $i ++) {
	$horas[$funciones->zerofill($i, 2)] = $funciones->zerofill($i, 2);
}
for($i = 0; $i <= 59; $i ++) {
	$minutos[$funciones->zerofill($i, 2)] = $funciones->zerofill($i, 2);
}
$lugares = array(
	'lugar 1' => 'lugar 1',
	'lugar 2' => 'lugar 2',
	'lugar 3' => 'lugar 3',
	'lugar 4' => 'lugar 4',
	'lugar 5' => 'lugar 5',
	'lugar 6' => 'lugar 6',
	'lugar 7' => 'lugar 7',
);

echo $form->create('Basic', array('class' => 'form_search', 'url' => array('controller' => 'basics', 'action' => 'search')));
echo '<div class="search_2">';
	echo $form->inputs(array(
		'fieldset' => false,
		'lugar_2' => array(
			'label' => __('Lugar de devolución', true),
			'options' => $lugares,
		),
		'fecha_2' => array(
			'label' => __('Fecha de devolución', true),
			'id' => 'to',
		),
	));
	echo '<label>' . __('Hora de devolución', true) . '</label><br />';
	echo $form->inputs(array(
		'fieldset' => false,
		'hora_2' => array(
			'label' => false,
			'div' => false,
			'type' => 'select',
			'options' => $horas,
			'class' => 'hora',
		),
		'min_2' => array(
			'label' => ':',
			'div' => false,
			'type' => 'select',
			'options' => $minutos,
			'class' => 'hora',
		)
	));
	echo $form->submit(__('Buscar opciones', true), array('div' => 'submit right'));
echo '</div>';
echo '<div class="search_1">';
	echo $form->inputs(array(
		'fieldset' => false,
		'lugar_1' => array(
			'label' => __('Lugar de recogida', true),
			'options' => $lugares,
		),
		'fecha_1' => array(
			'label' => __('Fecha de recogida', true),
			'id' => 'from',
		),
	));
	echo '<label>' . __('Hora de devolución', true) . '</label><br />';
	echo $form->inputs(array(
		'fieldset' => false,
		'hora_2' => array(
			'label' => false,
			'div' => false,
			'type' => 'select',
			'options' => $horas,
			'class' => 'hora',
		),
		'min_2' => array(
			'label' => ':',
			'div' => false,
			'type' => 'select',
			'options' => $minutos,
			'class' => 'hora',
		)
	));
	echo $form->end();
echo '</div>';
?>
