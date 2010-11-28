<?php
$css = array(
	//'cake.generic',
	'default',
	'menu',
	'static',
	'ui-lightness/theme',
);

$asset->css($css);

echo $asset->out('css');
