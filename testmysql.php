<?php
$sku = Array
(
    [0] => '{"pid":"1627207","vid":["28324","28326","28329"]}',
    [1] => '{"pid":"3950169","vid":["3266781","3266785"]}'
);

var_dump($sku);
foreach ($sku as $item) {
    $arr = json_decode($item);
    var_dump($arr);
}
?> 