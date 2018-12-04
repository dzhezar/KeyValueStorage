<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 02.12.18
 * Time: 21:10
 */

namespace Dzhezar\Store;


class KeyValueStoreJSon extends KeyValueStoreSerializeBase {

const file = 'data/storage.json';

    protected function getData(){
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

    public function remove($key): bool
    {
        $array = $this->getData();
        if(isset($array[$key])){
            unset($array[$key]);
            file_put_contents(self::file,json_encode($array));
            return true;
        }
        return false;
    }
}