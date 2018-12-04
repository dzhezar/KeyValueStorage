<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 04.12.18
 * Time: 14:42
 */

namespace Dzhezar\Store;


abstract class KeyValueStoreSerializeBase implements KeyValueStoreInterface
{
    const file = 'abstract';
    abstract public function set($key, $value);
    abstract public function remove($key);
    abstract protected function getData();

    public function get($key, $default = null)
    {
        $array = $this->getData();
        if(isset($array[$key])){
            return $array[$key];
        }
        else
            return $default;
    }

    public function has($key): bool
    {
        $array = $this->getData();
        return isset($array[$key]);
    }

    public function clear()
    {
        file_put_contents(self::file,'');
    }
}