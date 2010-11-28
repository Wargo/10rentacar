<?php
$blocks = MiCache::data($model, 'find', 'all', array(
	'conditions' => array(
		'active' => 1
	),
	'order' => array(
		'created' => 'desc'
	),
	'limit' => 3
));
$cont = 0;
$last = null;
foreach($blocks as $block) {
	$cont ++;
	if($cont == 3) {
		$last = 'last';
	}
	extract($block);
	?>
	<div class="block <?php echo $last; ?>">
		<div class="title"><?php echo $html->link(${$model}['title'], array('controller' => Inflector::tableize($model), 'action' => 'view', ${$model}['id']));; ?></div>
		<div class="content"><?php echo $funciones->recortar(${$model}['text'], 300); ?></div>
	</div>
	<?php
}
?>
