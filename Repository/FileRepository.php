<?php

namespace AVEFileBundle\Repository;

use AVEFileBundle\Core\Repository;
use AVEFileBundle\Entity\File;


class FileRepository extends Repository
{
    const SORT_ASC = 1;
    const SORT_DESC = 2;

    private $path = null;
    private $extension = null;
    private $sortDirection = null;

    private $recursiveDepth = 1;

    public function setPath(string $path)
    {
        $this->path = realpath($path);

        return $this;
    }

    public function setRecursiveDepth(int $recursiveDepth)
    {
        $this->recursiveDepth = $recursiveDepth;

        return $this;
    }

    public function setExtension(string $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    public function setCtimeSortDirection(int $sortDirection)
    {
        if (in_array($sortDirection, [self::SORT_ASC, self::SORT_DESC])) {
            $this->sortDirection = $sortDirection;
        }

        return $this;
    }

    public function all()
    {
        $directory = new \RecursiveDirectoryIterator($this->path);
        $iterator = new \RecursiveIteratorIterator($directory);

        $iterator->setMaxDepth($this->recursiveDepth);

        $fileList = [];

        foreach ($iterator as $fileinfo) {
            /**
             * @var \DirectoryIterator $fileinfo
             */
            if ($fileinfo->isFile()) {

                if ($this->extension) {
                    if ($this->extension === $fileinfo->getExtension()) {
                        $fileList[$fileinfo->getCTime()] = $fileinfo;
                    }
                }
                else {
                    $fileList[$fileinfo->getCTime()] = $fileinfo;
                }
            }
        }

        if ($this->sortDirection === self::SORT_ASC) {
            ksort($fileList);
        }
        elseif ($this->sortDirection === self::SORT_DESC) {
            krsort($fileList);
        }

        return $this->mapToODT($fileList);
    }

    private function mapToODT(array $fileList) {

        $odtList = [];
        foreach ($fileList as $fileinfo) {
            /**
             * @var \DirectoryIterator $fileinfo
             */
            $odtFile = new File();
            $odtFile->setName($fileinfo->getFilename());
            $odtFile->setPath($fileinfo->getRealPath());
            $odtList[] = $odtFile;
        }

        return $odtList;
    }
}
