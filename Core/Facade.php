<?php
/**
 * Базовый фасад
 *
 * User: Gagarin Alexey
 * Date: 28.01.2016 15:49
 */
namespace AVEFileBundle\Core;

use Symfony\Bridge\Doctrine\RegistryInterface;

use Psr\Log\LoggerInterface;

abstract class Facade
{

    public function __construct()
    {
    }

    public static function getClassWithNamespace()
    {
        return get_called_class();
    }

    public static function getServiceName()
    {
        $className = self::getClassWithNamespace();
        $className = str_replace('\\', '.', $className);
        $className = strtolower($className);

        return $className;
    }

}