<div class="news index">
	<h2><?php __('Noticias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort(__('Título', true), 'title');?></th>
			<th><?php echo $this->Paginator->sort(__('Texto', true), 'text');?></th>
			<th><?php echo $this->Paginator->sort(__('Creada', true), 'created');?></th>
			<th><?php echo $this->Paginator->sort(__('Modificada', true), 'modified');?></th>
			<th class="actions"><?php __('Acciones');?></th>
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
		<td><?php echo $News['title']; ?>&nbsp;</td>
		<td><?php echo $News['text']; ?>&nbsp;</td>
		<td><?php echo $News['created']; ?>&nbsp;</td>
		<td><?php echo $News['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $News['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $News['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $News['id']), null, __('¿Seguro que quieres borrar este dato?', true), $News['id']); ?>
		</td>
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
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Crear nuevo', true), array('action' => 'add')); ?></li>
	</ul>
</div>
