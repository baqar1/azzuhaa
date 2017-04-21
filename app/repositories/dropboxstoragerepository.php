<?php
namespace App\Repositories;

use Dropbox\Client;
use Illuminate\Filesystem\Filesystem;
use League\Flysystem\Dropbox\DropboxAdapter;


class DropboxStorageRepository{
    protected $client;
    protected $adapter;

    public function __construct()
    {
        $this->client = new Client('qoqSF9uPBmQAAAAAAAAD850FK2pgyzn7sWmlHDXCxeS7ySNsv0a3OFzJPEYuRAvj',
                'devartisans_testapp', null);
        $this->adapter = new DropboxAdapter($this->client);
    }

    public function getConnection(){
        return new Filesystem($this->adapter);
    }
}
