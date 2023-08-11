<?php
require_once 'src/TableSubtable.php';

// 中国时区
date_default_timezone_set('PRC');
$t = \fly\TableSubtable::create();
print_r($t->getTableStringNumber("fly321"));

print_r($t->getTableIntNumber(135341571543095));
