<?php

require __DIR__ . '/vendor/autoload.php';

foreach (glob(__DIR__ . '/migrations/*.php') as $filename) {
    require $filename;
}
