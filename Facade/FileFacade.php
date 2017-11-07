<?php

namespace AVEFileBundle\Facade;

use AVEFileBundle\Core\Facade;
use AVEFileBundle\Entity\File;
use AVEFileBundle\Repository\FileRepository;


class FileFacade extends Facade
{

    public function listPath (string $path, string $extension = null, int $depth = 1)
    {
        $rep = $this->getRepository()
            ->setPath($path)
            ->setRecursiveDepth($depth)
            ->setCtimeSortDirection(FileRepository::SORT_ASC);

        if ($extension) {
            $rep->setExtension($extension);
        }

        $items = $rep->all();

        return $items;
    }

    /**
     * @return FileRepository
     */
    public function getRepository()
    {
        return new FileRepository();
    }

}