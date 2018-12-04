<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 02.12.18
 * Time: 19:20
 */
namespace Dzhezar\Store;


abstract class KeyValueStore implements KeyValueStoreInterface
{
    private $storage = [];

    public function set($key, $value)
    {
        $this->storage[$key] = $value;
    }


    public function get($key, $default = null)
    {
        if(isset($this->storage[$key])) {
            return $this->storage[$key];
        }
        return $default;
    }

    public function has($key) : bool
    {
        return isset($this->storage[$key]);
    }
    public function clear()
    {
        $this->storage = null;
    }

    public function remove($key)
    {
        if(isset($this->storage[$key])) {
            unset($this->storage[$key]);
            return true;
        }
        return false;
    }
}
