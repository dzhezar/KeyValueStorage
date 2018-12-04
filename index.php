<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 02.12.18
 * Time: 20:51
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/console_helper.php';

use Dzhezar\Store\{KeyValueStore, KeyValueStoreJSon, KeyValueStoreYAML};


$list1 = new KeyValueStore();
$list1->set('apple',20);
writeln($list1->get('apple'));

$list2 = new KeyValueStoreJSon();
$list2->set('tomato',10);
$list2->set('potato',14);

$list2->get('potato');

$list2->clear();

$list3 = new KeyValueStoreYAML();
$list3->set('pineapple',40);
$list3->set('tea',10);
