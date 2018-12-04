<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 02.12.18
 * Time: 19:15
 */
namespace Dzhezar\Store;

interface KeyValueStoreInterface
{

    public function set($key, $value);

    public function get($key, $default = null);

    public function has($key): bool;

    public function remove($key);

    public function clear();
}

