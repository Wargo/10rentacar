<div class="news form">
<?php
if(!empty($id)) {
    echo $this->Form->create(null, array('url' => array('admin' => true, 'controller' => 'news', 'action' => 'edit')));
} else {
    echo $this->Form->create(null, array('url' => array('admin' => true, 'controller' => 'news', 'action' => 'add')));
}
?>
	<fieldset>
 		<legend><?php 
        if(!empty($id)) {
            echo __('Editando la noticia', true);
        } else {
            echo __('Insertando nuevo coche', true);
        }
        ?></legend>
	<?php
        echo $form->inputs(array(
            'fieldset' => false,
            'title' => array('maxlength' => 100, 'label' => __('Título', true)),
            'text' => array('type' => 'textarea', 'label' => __('Descripción', true)),
            'active' => array(
                'type' => 'checkbox',
                'label' => __('Publicar (se mostrará en la web)', true)
            )
        ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
        <?php if(!empty($id)) { ?>
            <li><?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $this->Form->value('News.id')), null, __('¿Estás seguro de querer eliminar este dato?', true)); ?></li>
        <?php } ?>
		<li><?php echo $this->Html->link(__('Ver listado', true), array('action' => 'index'));?></li>
	</ul>
</div>
