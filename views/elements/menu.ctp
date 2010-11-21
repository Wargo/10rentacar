<ul class="main_menu">
    <li><?php echo $html->link(__('Inicio', true), '/'); ?></li>
    <li><?php echo $html->link(__('Empresa', true), array('controller' => 'pages', 'action' => 'display', 'company')); ?></li>
    <li><?php echo $html->link(__('Servicios', true), array('controller' => 'services', 'action' => 'index')); ?></li>
    <li><?php echo $html->link(__('Flota', true), array('controller' => 'cars', 'action' => 'index')); ?></li>
    <li><?php echo $html->link(__('Ofertas', true), array('controller' => 'offers', 'action' => 'index')); ?></li>
    <li><?php echo $html->link(__('Noticias', true), array('controller' => 'news', 'action' => 'index')); ?></li>
    <li><?php echo $html->link(__('Contacto', true), array('controller' => 'pages', 'action' => 'display', 'contact')); ?></li>
</ul>
