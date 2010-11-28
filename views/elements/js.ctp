<?php
$js = array(
	'swfobject',
	'jquery',
	'jquery.listen',
	'jquery.timeago',
	'jquery.form',
	'jquery.ui',
	'date',
	'jquery.ui.datepicker',
	'jquery.ui.datepicker-es',
	'10rentacar',
);

$asset->js($js);

echo $asset->out('js');
