<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 02.12.18
 * Time: 21:10
 */

namespace App\src;


class KeyValueStoreJSon implements KeyValueStoreInterface{

private const file = 'data/storage.json';

    private function getData(){
        if(!file_exists(self::file)) {
            file_put_contents(self::file, '');
            return null;
        }
        else {
            $file = file_get_contents(self::file);
            return json_decode($file, true);
        }
    }

    public function set($key, $value)
    {
        $array = $this->getData();
        $array[$key] = $value;
        $data = json_encode($array);
        file_put_contents(self::file, $data);
    }

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
        if(isset($array[$key])){
            return true;
        }
        else
            return false;
    }

    public function remove($key): bool
    {
        $array = $this->getData();
        if(isset($array[$key])){
            unset($array[$key]);
            file_put_contents(self::file,json_encode($array));
            return true;
        }
        else
            return false;
    }


    public function clear()
    {
        file_put_contents(self::file,'');
    }
}