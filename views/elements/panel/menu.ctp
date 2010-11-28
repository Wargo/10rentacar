<ul class="panel_menu">
    <li><?php echo $html->link(__('Servicios', true), array('admin' => true, 'controller' => 'services', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'services'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Flota', true), array('admin' => true, 'controller' => 'cars', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'cars'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Ofertas', true), array('admin' => true, 'controller' => 'offers', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'offers'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Noticias', true), array('admin' => true, 'controller' => 'news', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'news'?'selected':''
	)); ?></li>
</ul>
