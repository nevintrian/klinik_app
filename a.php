<?php

$no_rm = 000000;
$str = (string)((int)(++$no_rm));
$str_count = strlen($str);

$result = '';
for ($i = 0; $i < 6 - $str_count; $i++) {
	$result .= '0';
}

$result .= (string)((int)($str));
echo $result;
