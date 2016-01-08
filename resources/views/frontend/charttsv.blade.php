<?php
foreach ($array_name as $value) {
	echo $value . "\t";
}
echo "\n";
foreach ($atdata as $key => $value) {
	foreach ($array_name as $name) {
		echo $value[$name] . "\t";
	}
	echo "\n";
}
?>