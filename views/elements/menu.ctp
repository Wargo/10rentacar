<ul class="main_menu clearfix">
    <li><?php echo $html->link(__('Inicio', true), '/', array(
		'class' => $this->params['controller'] == 'basics'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Empresa', true), array('controller' => 'pages', 'action' => 'display', 'company'), array(
		'class' => $this->params['url']['url'] == 'pages/company'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Servicios', true), array('controller' => 'services', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'services'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Flota', true), array('controller' => 'cars', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'cars'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Ofertas', true), array('controller' => 'offers', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'offers'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Noticias', true), array('controller' => 'news', 'action' => 'index'), array(
		'class' => $this->params['controller'] == 'news'?'selected':''
	)); ?></li>
    <li><?php echo $html->link(__('Contacto', true), array('controller' => 'pages', 'action' => 'display', 'contact'), array(
		'class' => $this->params['url']['url'] == 'pages/contact'?'selected':''
	)); ?></li>
</ul>
