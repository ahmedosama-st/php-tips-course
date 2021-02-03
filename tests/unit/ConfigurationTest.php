<?php

use App\Config;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function test_it_reads_proper_json()
    {
        $config = new Config('{"mail": {"smtp": "mailgun", "api_key": "abc123"}}');

        $this->assertEquals([
            'mail' => [
                'smtp' => 'mailgun',
                'api_key' => 'abc123'
            ]
        ], $config->data());
    }

    public function test_it_reads_proper_array()
    {
        $config = new Config;

        $config->readFromArray('config.php');

        $this->assertEquals(['db' => ['host' => '127.0.0.1']], $config->data());
    }

    public function test_it_gets_items_properly()
    {
        $config = new Config;

        $this->assertEquals('127.0.0.1', $config->get('db.hosts.primary'));
        $this->assertEquals('root', $config->get('db.user'));
    }

    public function test_it_finds_root()
    {
        $config = new Config;

        $config->readFromArray('config.php');

        $this->assertEquals(['host' => '127.0.0.1'], $config->findRoot('db'));
    }
}
