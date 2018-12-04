<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 02.12.18
 * Time: 22:26
 */

namespace Dzhezar\Store;

use Symfony\Component\Yaml\Yaml;

class KeyValueStoreYAML extends KeyValueStoreSerializeBase
{
    private const file = 'data/storage.yaml';

    protected function getData(){
        if(!file_exists(self::file)) {
            file_put_contents(self::file, '');
            return null;
        }
        else
            return Yaml::parseFile(self::file);
    }

    public function set($key, $value)
    {
        $array = $this->getData();
        $array[$key] = $value;
        $data = Yaml::dump($array);
        file_put_contents(self::file, $data);
    }

    public function remove($key): bool
    {
        $array = $this->getData();
        if(isset($array[$key])){
            unset($array[$key]);
            file_put_contents(self::file,Yaml::dump($array));
            return true;
        }
        else
            return false;
    }
}