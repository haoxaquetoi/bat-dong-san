<?php

header('Content-type: application/javascript');

foreach (scandir(__DIR__) as $item) {
   if (strpos($item, '.js') !== false) {
       echo "\n//" . $item . "\n";
       readfile(__DIR__ . '/' . $item);
   }
}