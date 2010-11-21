<?php
extract($offer);
?>
<div class="news view">
<h2><?php  __('Oferta');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Offer['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Offer['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripción'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Offer['text']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Offer['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modificada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $Offer['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $Offer['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $Offer['id']), null, __('¿Estás seguro de querer eliminar este dato?', true)); ?> </li>
		<li><?php echo $this->Html->link(__('Ver listado', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crear nuevo', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
