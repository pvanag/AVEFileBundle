<?php
/**
 * File entity
 *
 */
namespace AVEFileBundle\Entity;

/**
 * File
 *
 */
class File
{
    //<editor-fold desc="Properties">

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $path;

    //</editor-fold>

    //<editor-fold desc="Name">
    public function setName($val)
    {
        $this->name = $val;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    //</editor-fold>

    //<editor-fold desc="Path">
    public function setPath($val)
    {
        $this->path = $val;
        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }
    //</editor-fold>

}