<?php

namespace App\Utilties;

class Collection implements \IteratorAggregate, \Countable
{
    protected $items;

    public function __construct($items)
    {
        $this->add($items);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function add($items)
    {
        if (array_keys($items)) {
            foreach (array_keys($items) as $key) {
                $this->items[$key] = $items[$key];
            }
        } else {
            $this->items = $items;
        }
    }

    public function count()
    {
        return count($this->items);
    }

    public function put($key, $value)
    {
        $this->items[$key] = $value;
    }

    public function all()
    {
        return $this->items;
    }

    public function first()
    {
        return reset($this->items);
    }

    public function last()
    {
        return end($this->items);
    }

    public function flip()
    {
        return array_flip($this->items);
    }

    public function merge($items)
    {
        return array_merge($this->items, $items);
    }

    public function union($items)
    {
        return $this->items + $items;
    }

    public function mergeRecursive($items)
    {
        return array_merge_recursive($this->items, $items);
    }

    public function combine($values)
    {
        return array_combine($this->items, $values);
    }

    public function contains($key)
    {
        $keys = array_keys($this->items);

        return in_array($key, $keys);
    }

    public function only($keys)
    {
        if (is_string($keys)) {
            return $this->items[$keys];
        }

        if (is_array($keys)) {
            return array_intersect_key($this->items, array_flip($keys));
        }

        return false;
    }

    public function except($keys)
    {
        $original = $this->items;

        if (is_string($keys)) {
            unset($original[$keys]);
        }

        if (is_array($keys)) {
            foreach ($keys as $key) {
                unset($original[$key]);
            }
        }

        return $original;
    }

    public function flatten($depth = INF)
    {
        return Arr::flatten($this->items, $depth);
    }

    public function map(callable $callback)
    {
        return array_map($callback, $this->items);
    }

    public function filter($callback)
    {
        return array_filter($this->items, $callback);
    }
}
