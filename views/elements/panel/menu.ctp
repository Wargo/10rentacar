<ul class="main_menu">
    <li><?php echo $html->link(__('Servicios', true), array('admin' => true, 'controller' => 'services', 'action' => 'index')); ?></li>
    <li><?php echo $html->link(__('Flota', true), array('admin' => true, 'controller' => 'cars', 'action' => 'index')); ?></li>
    <li><?php echo $html->link(__('Ofertas', true), array('admin' => true, 'controller' => 'offers', 'action' => 'index')); ?></li>
    <li><?php echo $html->link(__('Noticias', true), array('admin' => true, 'controller' => 'news', 'action' => 'index')); ?></li>
</ul>
