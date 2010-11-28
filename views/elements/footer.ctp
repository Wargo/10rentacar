<?php
echo ' &copy; ' . date('Y') . ' ';
echo $html->link(__('10rentacar.es', true), '/');
echo ' ' . __('Todos los derechos reservados', true) . ' | ';
echo $html->link(__('Aviso legal', true), array('controller' => 'pages', 'action' => 'display', 'aviso_legal'));
echo ' | ';
echo $html->link(__('Información de alquiler', true), array('controller' => 'pages', 'action' => 'display', 'info'));
echo ' | ';
