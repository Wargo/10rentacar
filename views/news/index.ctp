<div class="cars index">
	<h2><?php __('Noticias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort(__('Título', true), 'title');?></th>
			<th><?php echo $this->Paginator->sort(__('Texto', true), 'text');?></th>
			<th><?php echo $this->Paginator->sort(__('Creada', true), 'created');?></th>
			<th><?php echo $this->Paginator->sort(__('Modificada', true), 'modified');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($news as $new):
        extract($new);
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $News['id']; ?>&nbsp;</td>
		<td><?php echo $html->link($News['title'], array('controller' => 'news', 'action' => 'view', $News['id'])); ?>&nbsp;</td>
		<td><?php echo $News['text']; ?>&nbsp;</td>
		<td><?php echo $News['created']; ?>&nbsp;</td>
		<td><?php echo $News['modified']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% totales, empezando en la fila %start%, hasta la %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
