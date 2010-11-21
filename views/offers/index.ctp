<div class="offers index">
	<h2><?php __('Ofertas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort(__('Título', true), 'title');?></th>
			<th><?php echo $this->Paginator->sort(__('Texto', true), 'text');?></th>
			<th><?php echo $this->Paginator->sort(__('Creado', true), 'created');?></th>
			<th><?php echo $this->Paginator->sort(__('Modificado', true), 'modified');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($offers as $offer):
        extract($offer);
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Offer['id']; ?>&nbsp;</td>
		<td><?php echo $html->link($Offer['title'], array('controller' => 'offers', 'action' => 'view', $Offer['id'])); ?>&nbsp;</td>
		<td><?php echo $Offer['text']; ?>&nbsp;</td>
		<td><?php echo $Offer['created']; ?>&nbsp;</td>
		<td><?php echo $Offer['modified']; ?>&nbsp;</td>
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
