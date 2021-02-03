<?php

namespace App;

class Config
{
    protected $data;
    protected $default = null;

    public function __construct($json = null)
    {
        $this->readFromJson($json ?? 'config.json');
    }

    public function readFromJson(string $file)
    {
        $this->data = is_file($file) ? json_decode(file_get_contents($file), true) : json_decode($file, true);
    }

    public function findRoot($offset)
    {
        return $this->data[$offset];
    }

    public function get($key, $default = null)
    {
        $pieces = explode('.', $key);
        $item = $this->data;

        foreach ($pieces as $piece) {
            if (isset($item[$piece])) {
                $item = $item[$piece];
            } else {
                $item = $this->default;
                break;
            }
        }

        return $item;
    }

    public function data()
    {
        return $this->data;
    }

    public function readFromArray($file)
    {
        $this->data = is_file($file) ? require $file : (array) $file;
    }
}
