<?php

namespace App\Utilities;

use Countable;
use ZipArchive;

class Zipper implements Countable
{
    private ZipArchive $zipper;

    public function __construct()
    {
        $this->zipper = new ZipArchive();
    }

    public function count(): int
    {
        return $this->zipper->count();
    }

    public function createOrModify(string $zipName): self
    {
        $this->zipper->open($zipName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        return $this;
    }

    public function addFiles($files): self
    {
        if (is_string($files)) {
            $this->zipper->addFile($files);
        }

        if (is_array($files)) {
            array_map(fn ($file) => $this->zipper->addFile($file), $files);
        }

        return $this;
    }

    public function addDirectories($directories)
    {
        if (is_string($directories)) {
            $this->zipper->addGlob($directories . '/*');
        }

        if (is_array($directories)) {
            array_map(fn ($directory) => $this->zipper->addGlob($directory . '/*'), $directories);
        }

        return $this;
    }

    public function close(): void
    {
        $this->zipper->close();
    }
}
