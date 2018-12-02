<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 02.12.18
 * Time: 19:20
 */
namespace App\src;

class KeyValueStore implements KeyValueStoreInterface
{
    private $variables = array();

    public function set($key, $value) : void
    {
        $this->variables[$key] = $value;
    }


    public function get($key, $default = null)
    {
        if(isset($this->variables[$key])) {
            return $this->variables[$key];
        }
        else
            return $default;
    }

    public function has($key): bool
    {
        if(isset($this->variables[$key])) {
            return true;
        }
        else
            return false;
    }

    public function clear() : void
    {
        $this->variables = null;
    }

    public function remove($key) : bool
    {
        if(isset($this->variables[$key])) {
            unset($this->variables[$key]);
            return true;
        }
        else
            return false;
    }
}
